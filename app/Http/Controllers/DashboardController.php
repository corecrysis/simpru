<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Model\User;
use App\Model\Booking;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $data = Auth::user();
        return view('edit_profil', [
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $validation = Validator::make(Input::all(),
            array(
                'name' => 'required',
                'email' => 'required|email|max:255',
                'identifier' => 'numeric',
                'no_hp' => 'numeric',
                'tipe' => 'in:internal,eksternal',
            )
        );
        if ($validation->fails()) {
            //withInput keep the users info
//            dd($validation->messages());
            return Redirect::back()->withInput()->withErrors($validation->messages())->with('messages',['Data gagal diperbaui!', 'danger', 'times']);
        } else {
            User::find(Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'identifier' => $request->identifier,
                'no_hp' => $request->no_hp,
                'keanggotaan' => $request->tipe,
            ]);
        }

        return redirect()->back()->with('messages',['Data berhasil diperbaui!', 'success', 'check']);
    }

    public function transaksi()
    {
        $booking = Booking::leftJoin('booking_waktu as bw', 'bw.id_booking', '=', 'booking.id_booking')
            ->leftJoin('ruangan as rx', 'rx.id_ruangan', '=', 'bw.id_ruangan')
            ->leftJoin('users as ux', 'ux.id', '=', 'booking.id_pengguna')
            ->select('booking.*', 'bw.id_booking_waktu', 'rx.nm_ruangan', 'bw.start_date', 'bw.end_date', 'bw.status_verif', 'ux.name', 'bw.keterangan')
            ->where('booking.id_pengguna', Auth::user()->id)->get();

        return view('histori_peminjaman', [
            'data' => $booking
        ]);
    }

    public function uploadSurat($id, Request $request){
        $filename_surat = null;
        $validation = Validator::make(Input::all(),
            array(
                'surat' => 'nullable|mimes:pdf,jpg,png,gif,jpeg|max:2048',
            )
        );
        if ($validation->fails()) {
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
            $booking = Booking::find($id);
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

            if($booking->save()){
                return redirect()->back()->with('Success', 'Berhasil upload surat!');
            }
            else {
                return redirect()->back()->with('Error', 'Gagal upload surat!');
            }
        }
    }
}
