<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Model\Ruangan;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Model\Booking;
use App\Model\BookingWaktu;
use App\Http\Controllers\Controller;
use App\Model\RestriksiRuangan;
use Illuminate\Support\Facades\Mail;
//use app\Http\Controllers\LayananController as Layanan;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//
//    private function getLayanan(){
//        $layanan = new Layanan();
//        return $layanan;
//    }

    public function index()
    {
        $booking_user = Booking::join('users as px', 'px.id', '=', 'booking.id_pengguna')
            ->leftJoin('booking_waktu as bw', 'bw.id_booking', '=', 'booking.id_booking')
            ->leftJoin('ruangan as rx', 'rx.id_ruangan', '=', 'bw.id_ruangan')
            ->leftJoin('admins as ax', 'ax.id', '=', 'bw.id_admin_verif')
            ->leftJoin('kategori as ka', 'ka.id_kategori_ruangan', '=', 'rx.id_kategori_ruangan')
            ->select('booking.*', 'bw.id_booking_waktu', 'px.name', 'rx.nm_ruangan', 'bw.start_date', 'bw.end_date', 'bw.status_verif', 'ax.name as admin_verif')
            ->where('bw.status_verif','0');

        if(Auth::user()->id_kategori == '0'){
            $booking_user->where('ka.jenis_kategori', 'sarpras') ;
        }
        else if( Auth::user()->id_kategori != '' ){
            $booking_user->where('rx.id_kategori_ruangan', Auth::user()->id_kategori);
        }

        $booking = Booking::join('admins as px', 'px.id', '=', 'booking.id_admin')
            ->leftJoin('booking_waktu as bw', 'bw.id_booking', '=', 'booking.id_booking')
            ->leftJoin('ruangan as rx', 'rx.id_ruangan', '=', 'bw.id_ruangan')
            ->leftJoin('admins as ax', 'ax.id', '=', 'bw.id_admin_verif')
            ->leftJoin('kategori as ka', 'ka.id_kategori_ruangan', '=', 'rx.id_kategori_ruangan')
            ->select('booking.*', 'bw.id_booking_waktu', 'px.name', 'rx.nm_ruangan', 'bw.start_date', 'bw.end_date', 'bw.status_verif', 'ax.name as admin_verif')
            ->where('bw.status_verif','0');

        if(Auth::user()->id_kategori == '0'){
            $booking->where('ka.jenis_kategori', 'sarpras') ;
        }
        else if( Auth::user()->id_kategori != '' ){
            $booking->where('rx.id_kategori_ruangan', Auth::user()->id_kategori);
        }

        $booking->union($booking_user)
            ->orderBy('timestamp', 'asc');

        return view('admin.booking.view', array(
            'booking' => $booking->get(),
        ));
    }
    public function validviewbook()
    {
        $booking_user = Booking::join('users as px', 'px.id', '=', 'booking.id_pengguna')
            ->leftJoin('booking_waktu as bw', 'bw.id_booking', '=', 'booking.id_booking')
            ->leftJoin('ruangan as rx', 'rx.id_ruangan', '=', 'bw.id_ruangan')
            ->leftJoin('admins as ax', 'ax.id', '=', 'bw.id_admin_verif')
            ->leftJoin('kategori as ka', 'ka.id_kategori_ruangan', '=', 'rx.id_kategori_ruangan')
            ->select('booking.*', 'bw.id_booking_waktu', 'px.name', 'rx.nm_ruangan', 'bw.start_date', 'bw.end_date', 'bw.status_verif', 'ax.name as admin_verif')
            ->whereIn('bw.status_verif',['1','2','3']);

        if(Auth::user()->id_kategori == '0'){
            $booking_user->where('ka.jenis_kategori', 'sarpras') ;
        }
        else if( Auth::user()->id_kategori != '' ){
            $booking_user->where('rx.id_kategori_ruangan', Auth::user()->id_kategori);
        }

        $booking = Booking::join('admins as px', 'px.id', '=', 'booking.id_admin')
            ->leftJoin('booking_waktu as bw', 'bw.id_booking', '=', 'booking.id_booking')
            ->leftJoin('ruangan as rx', 'rx.id_ruangan', '=', 'bw.id_ruangan')
            ->leftJoin('admins as ax', 'ax.id', '=', 'bw.id_admin_verif')
            ->leftJoin('kategori as ka', 'ka.id_kategori_ruangan', '=', 'rx.id_kategori_ruangan')
            ->select('booking.*', 'bw.id_booking_waktu', 'px.name', 'rx.nm_ruangan', 'bw.start_date', 'bw.end_date', 'bw.status_verif', 'ax.name as admin_verif')
            ->whereIn('bw.status_verif',['1','2','3']);

        if(Auth::user()->id_kategori == '0'){
            $booking->where('ka.jenis_kategori', 'sarpras') ;
        }
        else if( Auth::user()->id_kategori != '' ){
            $booking->where('rx.id_kategori_ruangan', Auth::user()->id_kategori);
        }

        $booking->union($booking_user)
            ->orderBy('timestamp', 'asc');

        return view('admin.booking.validview', array(
            'booking' => $booking->get(),
        ));
    }

    public function create(Request $request)
    {
        $ruang = [];

        if($request->session()->has('admin.admin_book')){
            $ruang = $request->session()->get('admin.admin_book');
        }

        if(Auth::user()->id_kategori == 0){
            $ruangan = Ruangan::leftJoin('kategori as ka', 'ka.id_kategori_ruangan', '=', 'ruangan.id_kategori_ruangan')
                ->where('ka.jenis_kategori', 'sarpras')->get();
        }
        else if (Auth::user()->id_kategori != ''){
            $ruangan = Ruangan::where('id_kategori_ruangan', Auth::user()->id_kategori)->get();
        }
        else {
            $ruangan = Ruangan::all();
        }

        return view('admin.booking.create', array(
            'ruangan' => $ruangan,
            'items' => $ruang
        ));
    }

    public function destroy(Request $request){
        $id_booking = $request->booking;
        $id_booking_waktu = $request->booking_waktu;
        BookingWaktu::find($id_booking_waktu)->delete();
        if(!BookingWaktu::where('id_booking', $id_booking)->exists()){
            Booking::find($id_booking)->delete();
        }
        return redirect()->back();
    }

    //TIDAK DIPAKAI

    public function getDisabledIntervals($id_ruangan, $tanggal)
    {
        $waktu = BookingWaktu::where('id_ruangan', $id_ruangan)
            ->where(function ($query)  use ($tanggal) {
                $query->whereDate('start_date', '=', $tanggal)
                    ->orWhereDate('end_date', '=', $tanggal)
                    ->orWhereRaw("'".$tanggal."' BETWEEN start_date AND end_date ");
            })
            ->get();
        $data_json = [];
        foreach ($waktu as $w) {
            $arr = [];

            if(date('Y-m-d', strtotime($tanggal)) > date('Y-m-d', strtotime($w['start_date'])) && date('Y-m-d', strtotime($w['end_date'])) > date('Y-m-d', strtotime($w['start_date']))){
                $arr['h_s'] = '00';
                $arr['m_s'] = '01';
            }
            else {
                $arr['h_s'] = date('H', strtotime($w['start_date']));
                $arr['m_s'] = date('i', strtotime($w['start_date']));
            }

            if(date('Y-m-d', strtotime($tanggal)) < date('Y-m-d', strtotime($w['end_date'])) && date('Y-m-d', strtotime($w['end_date'])) > date('Y-m-d', strtotime($w['start_date']))){
                $arr['h_e'] = '23';
                $arr['m_e'] = '59';
            }
            else {
                $arr['h_e'] = date('H', strtotime($w['end_date']));
                $arr['m_e'] = date('i', strtotime($w['end_date']));
            }
            array_push($data_json, $arr);
        }
        return json_encode($data_json);
    }

    public function insert(Request $request)
    {
//        dd($request);
        $filename_bukti = null;
        $filename_surat = null;

        $validation = Validator::make(Input::all(),
            array(
                'tujuan' => 'required|max:255',
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
            $booking->tujuan_pinjam = $request->tujuan;
            $booking->id_admin = Auth::user()->id;
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
                $request->file('bukti')->move($destination, $filename_bukti);
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

            if ($booking->save()) {
                $check = true;
                $ruangan = $request->ruang;
                $i = 0;
                foreach ($ruangan as $r) {
                    if($r != null){
                        $booking_waktu = new BookingWaktu;
                        $booking_waktu->id_booking = $booking->id_booking;
                        $booking_waktu->start_date = date('Y-m-d H:i:s', strtotime($request->start_date[$i].' '.$request->start_time[$i]));
                        $booking_waktu->end_date =  date('Y-m-d H:i:s', strtotime($request->end_date[$i].' '.$request->end_time[$i]));
                        $booking_waktu->id_ruangan = $r;
                        $booking_waktu->expired_at = date('Y-m-d H:i:s', strtotime(date("Y-m-d H:i:s"). ' + 2 days'));
                        if($request->has('verif')){
                            if($request->verif == 'yes'){
                                $booking_waktu->status_verif = '1';
                                $booking_waktu->keterangan = 'Booking lewat admin';
                            }
                        }
                        if ($booking_waktu->save()) {
                            $check = true;
                        } else {
                            $check = false;
                        }
                    }
                    $i++;
                }

                if ($check) {
                    $request->session()->forget('admin.admin_book');
                    return redirect('admin/booking')->with('messages',['Booking telah berhasil dilakukan!', 'success', 'check']);
                } else {
                    return redirect('admin/booking')->with('messages',['Booking tidak berhasil!', 'danger', 'times']);
                }
            }
        }
    }

    public function editBooking($id)
    {
        $booking = Booking::find($id);
        $ruangan = Ruangan::All();
        $pengguna = Pengguna::All();
        $admin = Admin::All();
        //          dd($kategori->nm_kategori);
        return view('admin.booking.edit', array(
            'ruangan' => $ruangan,
            'pengguna' => $pengguna,
            'booking' => $booking,
            'admin' => $admin,
        ));
    }

    public function verifikasiBooking(Request $request)
    {
        $bookingvalidasi = BookingWaktu::find($request->id_booking_waktu);
        $bookingvalidasi->status_verif = $request->status;
        $bookingvalidasi->id_admin_verif = Auth::user()->id;
        if($request->has('keterangan')){
            $bookingvalidasi->keterangan = $request->keterangan;
        }
        $bookingvalidasi->save();

        $booking = Booking::leftJoin('booking_waktu', 'booking.id_booking', '=', 'booking_waktu.id_booking')
            ->leftJoin('users', 'booking.id_pengguna', '=', 'users.id')
            ->leftJoin('ruangan', 'ruangan.id_ruangan', '=', 'booking_waktu.id_ruangan')
            ->select('booking.*', 'booking_waktu.*', 'users.name', 'users.email', 'ruangan.nm_ruangan')
            ->where('booking_waktu.id_booking_waktu', $request->id_booking_waktu)
            ->first()
            ->toArray();

        if($booking['status_verif'] == '1'){
            $booking['status_verif_text'] = 'Diterima';
            $booking['color'] = 'green';
        }
        else if($booking['status_verif'] == '2'){
            $booking['status_verif_text'] = 'Ditolak';
            $booking['color'] = 'red';
        }

        Mail::send('admin.emails.verif_book', ['data' => $booking], function ($m) use ($booking) {
            $m->from('simpru.its@gmail.com', 'SIMPRU ITS');

            $m->to($booking['email'], $booking['name'])->subject('Verifikasi peminjaman ruangan | SIMPRU');
        });

        return redirect()->back();

    }


    public function updateBooking(Request $request, $id_ruangan)
    {
        $booking = Booking::find($id_ruangan);
        $booking->id_ruangan = $request->id_ruangan;
        $booking->waktu_pinjam_mulai = $request->waktu_pinjam_mulai;
        $booking->waktu_pinjam_selesai = $request->waktu_pinjam_selesai;
        $booking->pembayaran = $request->pembayaran;
        $booking->status_verif = $request->status_verif;
        $booking->status_validasi = $request->status_validasi;
        $booking->tujuan_pinjam = $request->tujuan_pinjam;
        $booking->id_pengguna = $request->id_pengguna;
        $booking->id_admin = $request->id_admin;
        $booking->id_kategori_ruangan = $request->id_kategori_ruangan;
        $booking->save();
        return $this->index();

    }

//    PINDAHAN FUNCTION DARI BOOKING & LAYANAN USER
    public function getPilihJadwal($id_ruangan, Request $request)
    {
        $jadwal_database = $this->getJadwal($id_ruangan);
        $jadwal_session = $this->getSessionJadwal($id_ruangan, $request);
        $merge = json_encode(array_merge($jadwal_database, $jadwal_session));
        $view = view('admin.booking._modal_detail', [
                'id' => $id_ruangan,
                'jadwal' => $merge,
                'aturan' => json_encode($this->getAturanRuang($id_ruangan)),
            ]
        )->renderSections();

        return response()->json([
            'calendar' => $view['calendar'],
            'script' => $view['script-calendar'],
        ]);
    }

    public function getPilihEditJadwal($rowId, $id_ruangan, Request $request)
    {
        $jadwal_database = $this->getJadwal($id_ruangan);
        $jadwal_session = $this->getEditableJadwal($rowId, $id_ruangan, $request);
        $merge = json_encode(array_merge($jadwal_database, $jadwal_session));
        $view = view('admin.booking._modal_edit', [
                'id' => $id_ruangan,
                'rowId' => $rowId,
                'jadwal' => $merge,
                'aturan' => json_encode($this->getAturanRuang($id_ruangan)),
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

        if ($request->session()->has('admin.admin_book')) {
            $ruang = $request->session()->pull('admin.admin_book');
            foreach ($ruang as $r){
                if ($r['id_ruangan'] != $id) {
                    $request->session()->push('admin.admin_book', $r);
                }
            }
        }

        for ($i = 0; $i < count($start_date); $i++) {

            $request->session()->push('admin.admin_book', [
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

    public function updateAdminBook(Request $request)
    {
        $ruang = $request->session()->get('admin.admin_book');
        $ruangan = Ruangan::All();

        return view('admin.booking._row_book', [
                'items' => $ruang,
                'list_ruangan' => $ruangan,
            ]
        );
    }

    public function deleteBook($rowId, Request $request)
    {
        $ruang = $request->session()->pull('admin.admin_book');
        $temp_ruang = [];
        //delete
        foreach ($ruang as $key => $val) {
            if ($val['rowId'] !== $rowId) {
                array_push($temp_ruang, $ruang[$key]);
            }
        }
//        if (($key = $this->searchForId($rowId, $ruang, 'rowId')) != null) {
//            //push new
//            array_push($temp_ruang, $ruang[$key]);
//        }
//        dd($temp_ruang);
        $request->session()->put('admin.admin_book', $temp_ruang);
        return response()->json([
            'response' => [
                'status' => '200',
                'title' => 'success',
                'message' => 'Peminjaman berhasil dihapus dari peminjaman',
            ],
            'items' => [
                'total_book' => count($temp_ruang),
            ],
        ]);
    }

//    public function flush(Request $request)
//    {
//        $request->session()->flush();
//    }

    private function searchForId($id, $array, $opt)
    {
        foreach ($array as $key => $val) {
            if ($val[$opt] === $id) {
                return $key;
            }
        }
        return null;
    }

    public function getJadwal($id_ruangan)
    {
        $data_json = [];
        $data = Booking::leftJoin('booking_waktu', 'booking.id_booking', '=', 'booking_waktu.id_booking')
            ->select('booking.*', 'booking_waktu.*')
            ->where('booking_waktu.id_ruangan', $id_ruangan)
            ->whereIn('booking_waktu.status_verif', ['0','1'])
            ->get();
//        dd($data);
        foreach ($data as $d) {
            $arr = [
                'title' => $d->nm_ruangan.'<br/> Instansi: ' . $d->instansi . '<br/> Tujuan: ' . $d->tujuan_pinjam,
                'start' => date('c', strtotime($d->start_date)),
                'end' => date('c', strtotime($d->end_date)),
                'editable' => false,
                'className' => 'scheduled-event',
//                'description' => 'Ruang '.$d->nm_ruangan.'; Instansi: ' . $d->instansi . '; Tujuan: ' . $d->tujuan_pinjam,
                'textColor' => 'black'
            ];
            if($d->status_verif=='0'){
                $arr['color'] = '#eef442';
                $arr['description'] = '<span  style="color:red;">Jadwal ini telah di booking tapi belum disetujui.</span> <br/><br/>'.$d->nm_ruangan.'<br/> Instansi: ' . $d->instansi . '<br/> Tujuan: ' . $d->tujuan_pinjam. '<br/> Jam: ' . date('H:i', strtotime($d->start_date)) . '-'. date('H:i', strtotime($d->end_date));
            }
            else if($d->status_verif=='1'){
                $arr['color'] = '#20e863';
                $arr['description'] = '<span style="color:red;">Jadwal ini telah disetujui.</span><br/><br/>'.$d->nm_ruangan.'<br/> Instansi: ' . $d->instansi . '<br/> Tujuan: ' . $d->tujuan_pinjam. '<br/> Jam: ' . date('H:i', strtotime($d->start_date)) . '-'. date('H:i', strtotime($d->end_date));
            }
            array_push($data_json, $arr);
        }
        return $data_json;
    }

    public function getSessionJadwal($id_ruangan, $request)
    {
        $data_json = [];
        if ($request->session()->has('admin.admin_book')) {
            $ruang = $request->session()->get('admin.admin_book');
//            var_dump($id_ruangan);
            $i = 1;
            foreach ($ruang as $d) {
                if ($d['id_ruangan'] == $id_ruangan) {
                    $arr = [];
//                    $arr['editable'] = true;
//                    $arr['durationEditable'] = true;
                    $arr['editable'] = false;
                    $arr['durationEditable'] = false;
                    $arr['color'] = 'red';
                    $arr['className'] = 'schedule-event';
                    $arr['id'] = $d['rowId'];
                    $arr['title'] = 'Ini peminjaman ke-'.$i.' anda.';
                    $arr['description'] = 'Jika ingin merubah waktu, tutup pop up dan pilih peminjaman ke-'.$i.' anda. ';
                    $arr['start'] = date('c', strtotime($d['start_date']));
                    $arr['end'] = date('c', strtotime($d['end_date']));
                    array_push($data_json, $arr);
                }
                $i++;
            }
        }
        return $data_json;
    }

    //TIDAK DIPAKAI
    public function getAllSessionJadwal($request)
    {
        $data_json = [];
        if ($request->session()->has('admin.admin_book')) {
            $ruang = $request->session()->get('admin.admin_book');
//            var_dump($ruang);
            foreach ($ruang as $d) {
                $arr = [];
                $arr['editable'] = true;
                $arr['durationEditable'] = true;
//                $arr['color'] = '#24af90';
                $arr['className'] = 'schedule-event';
                $arr['id'] = $d['rowId'];
                $arr['title'] = '';
                $arr['start'] = date('c', strtotime($d['start_date']));
                $arr['end'] = date('c', strtotime($d['end_date']));
                array_push($data_json, $arr);
            }
        }
        return $data_json;
    }

    public function getEditableJadwal($rowId, $id_ruangan, $request)
    {
        $data_json = [];
        if ($request->session()->has('admin.admin_book')) {
            $ruang = $request->session()->get('admin.admin_book');
            $i = 1;
            foreach ($ruang as $d) {
                $arr = [];
                if ($d['id_ruangan'] == $id_ruangan) {
                    if ($d['rowId'] == $rowId) {
                        $arr['editable'] = true;
                        $arr['durationEditable'] = true;
                        $arr['className'] = 'schedule-event';
//                        $arr['color'] = '#24af90';
                        $arr['title'] = 'Silahkan edit waktu ini :)';
                        $arr['description'] = 'Geser atau tarik untuk merubah!';
                    } else {
                        $arr['editable'] = false;
                        $arr['durationEditable'] = false;
                        $arr['className'] = 'schedule-event';
                        $arr['color'] = 'red';
                        $arr['title'] = 'Ini peminjaman ke-'.$i.' anda.';
                        $arr['description'] = 'Jika ingin merubah waktu, tutup pop up dan pilih peinjaman ke-'.$i.' anda. ';
                    }
                    $arr['id'] = $d['rowId'];
                    $arr['start'] = date('c', strtotime($d['start_date']));
                    $arr['end'] = date('c', strtotime($d['end_date']));
                    array_push($data_json, $arr);
                }
                $i++;
            }
        }
        return $data_json;
    }

    public function getAturanRuang($id_ruangan)
    {
        $aturan = RestriksiRuangan::where('id_ruangan', $id_ruangan)->get();
        $data_json = [];
        foreach ($aturan as $atur){
            $arr = [];
            $arr['start'] = $atur['waktu_aturan_mulai'];
            $arr['end'] = $atur['waktu_selesai'];
            $arr['dow'] = [(int)$atur['hari_ruangan']];
            array_push($data_json, $arr);
        }
//        dd($aturan);
        return $data_json;
    }
}
