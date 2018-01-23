<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Model\Ruangan;
use App\Model\Booking;
use App\Model\BookingWaktu;
use App\Model\RestriksiRuangan;
use App\Http\Controllers\LayananController as Layanan;
use Illuminate\Support\Facades\Mail;
use App\Model\Admin;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    private function getLayanan(){
        $layanan = new Layanan();
        return $layanan;
    }

    public function index(Request $request)
    {
        $ruangan = $request->session()->get('user.ruang_book');
        if (count($ruangan) > 0) {
            return view('booking', [
                'data' => $ruangan
            ]);
        } else {
            return Redirect::back();
        }
    }

    public function daftarPeminjaman(Request $request)
    {
        $ruangan = $request->session()->get('user.ruang_book');

        return view('daftar_peminjaman', [
            'data' => $ruangan
        ]);

    }

    public function storeBooking(Request $request)
    {
        $filename_bukti = null;
        $filename_surat = null;

        $validation = Validator::make(Input::all(),
            array(
                'tujuan_pinjam' => 'required|max:255',
                'instansi' => 'required|max:255',
                'bukti' => 'nullable|mimes:pdf,jpg,png,gif,jpeg|max:2048',
                'surat' => 'nullable|mimes:pdf,jpg,png,gif,jpeg|max:2048',
            )
        );
        if ($validation->fails()) {
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {

            $booking = new Booking;
            $booking->tujuan_pinjam = $request->tujuan_pinjam;
            $booking->id_pengguna = Auth::user()->id;
            $booking->instansi = $request->instansi;
            //sementara untuk pembayaran belum dimasukkan karena bisa saat itu juga atau bisa dilengkapi di lain waktu
            if ($request->file('bukti') != null) {
                //upload bukti
                $destination = storage_path('/app/public/booking/bukti/');
//                $destination = storage_path('/app/public/user/bukti/123');
                $file_req = $request->file('bukti')->getClientOriginalName();
                $file = explode('.', $file_req);
                $filename_bukti = $file[0] . '_' . Auth::user()->id .'_'. time() . '.' . $file[1];
                $booking->pembayaran = $filename_bukti;
                $request->file('bukti')->move($destination, $filename_surat);
            }

            if ($request->file('surat') != null) {
                //upload surat
                $destination1 = storage_path('/app/public/booking/surat/');
//                $destination1 = storage_path('/app/public/user/surat/123');
                $file_req1 = $request->file('surat')->getClientOriginalName();
                $file1 = explode('.', $file_req1);
                $filename_surat = $file1[0] . '_' . Auth::user()->id .'_'. time() . '.' . $file1[1];
                $booking->berkas_peminjaman = $filename_surat;
                $request->file('surat')->move($destination1, $filename_surat);
            }
            $mail_admin = [];
            $ruangan = $request->session()->get('user.ruang_book');
            if ($booking->save()) {
                $check = true;
                foreach ($ruangan as $r) {
                    array_push($mail_admin, $r['id_ruangan']);
                    $booking_waktu = new BookingWaktu;
                    $booking_waktu->id_booking = $booking->id_booking;
                    $booking_waktu->start_date = $r['start_date'];
                    $booking_waktu->end_date = $r['end_date'];
                    $booking_waktu->id_ruangan = $r['id_ruangan'];
                    $booking_waktu->expired_at = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s"). ' + 2 days'));
                    if ($booking_waktu->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                }

                if ($check) {
                    //kirim email ke masing-masing admin
                    $ruangan2 = array_unique($mail_admin);
                    foreach ($ruangan2 as $r) {
                        $admins = Admin::where('id_kategori', Ruangan::find($r)->id_kategori_ruangan)->get();
                        foreach ($admins as $admin){
                            Mail::send('emails.new_book', ['user' => $admin], function ($m) use ($admin) {
                                $m->from('simpru.its@gmail.com', 'SIMPRU ITS');

                                $m->to($admin->email, $admin->name)->subject('ALERT | New Booking!');
                            });
                        }
                    }

                    $request->session()->forget('user.ruang_book');
                    return view('booking_sukses');
                } else {
                    return view('booking_gagal');
                }
            }
        }
        return view('booking_gagal');
    }

    public function getPilihJadwal($id_ruangan, Request $request)
    {
        $jadwal_database = $this->getLayanan()->getJadwal($id_ruangan);
        $jadwal_session = $this->getLayanan()->getSessionJadwal($id_ruangan, $request);
        $merge = json_encode(array_merge($jadwal_database, $jadwal_session));
        $view = view('_modal_detail', [
                'id' => $id_ruangan,
                'jadwal' => $merge,
                'aturan' => json_encode($this->getLayanan()->getAturanRuang($id_ruangan)),
            ]
        )->renderSections();

        return response()->json([
            'calendar' => $view['calendar'],
            'script' => $view['script-calendar'],
        ]);
    }

    public function getPilihEditJadwal($rowId, $id_ruangan, Request $request)
    {
        $jadwal_database = $this->getLayanan()->getJadwal($id_ruangan);
        $jadwal_session = $this->getLayanan()->getEditableJadwal($rowId, $id_ruangan, $request);
        $merge = json_encode(array_merge($jadwal_database, $jadwal_session));
        $view = view('_modal_edit', [
                'id' => $id_ruangan,
                'rowId' => $rowId,
                'jadwal' => $merge,
                'aturan' => json_encode($this->getLayanan()->getAturanRuang($id_ruangan)),
            ]
        )->renderSections();

        return response()->json([
            'calendar' => $view['calendar'],
            'script' => $view['script-calendar'],
        ]);
    }

    public function addBooking(Request $request)
    {
        $id = Input::get('id_ruangan');
        $start_date = Input::get('start_date');
        $end_date = Input::get('end_date');
        $rowId = Input::get('rowId');
        $ruangan = Ruangan::find($id);

        if ($request->session()->has('user.ruang_book')) {
            $ruang = $request->session()->pull('user.ruang_book');
            foreach ($ruang as $r){
                if ($r['id_ruangan'] != $id) {
                    $request->session()->push('user.ruang_book', $r);
                }
            }
        }

        for ($i = 0; $i < count($start_date); $i++) {

            $request->session()->push('user.ruang_book', [
                'rowId' => $rowId[$i],
                'id_ruangan' => $id,
                'nm_ruangan' => $ruangan->nm_ruangan,
                'start_date' => $start_date[$i],
                'end_date' => $end_date[$i]
            ]);
        }

        return response()->json([
                'response' => [
                    'status' => '200',
                    'title' => 'success',
                    'message' => 'Data Berhasil Disimpan!',
                ],
                'items' => [],
            ]
        );
    }

    public function updateCartBook(Request $request)
    {
        $ruang = $request->session()->get('user.ruang_book');

        return view('layouts._header_items', [
                'items_book' => $ruang,
                'total_book' => count($ruang),
            ]
        );
    }

    public function deleteBook($rowId, Request $request)
    {
        $ruang = $request->session()->pull('user.ruang_book');
        $temp_ruang = [];
        //delete
        foreach ($ruang as $key => $val) {
            if ($val['rowId'] !== $rowId) {
                array_push($temp_ruang, $ruang[$key]);
            }
        }
        $request->session()->put('user.ruang_book', $temp_ruang);
        return response()->json([
            'response' => [
                'status' => '200',
                'title' => 'success',
                'message' => 'Peminjaman berhasil dihapus dari keranjang',
            ],
            'items' => [
                'total_book' => count($temp_ruang),
            ],
        ]);
    }

    public function flush(Request $request)
    {
        $request->session()->flush();
    }

    private function searchForId($id, $array, $opt = 'rowId')
    {
        foreach ($array as $key => $val) {
            if ($val[$opt] === $id) {
                return $key;
            }
        }
        return null;
    }
}
