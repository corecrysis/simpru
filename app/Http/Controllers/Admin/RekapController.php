<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Kategori;
use App\Model\Booking;
use App\Http\Controllers\Controller;

class RekapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $kategori = Kategori::All();
        return view('admin.rekap.index', array(
            'kategori' => $kategori,
        ));
    }
    public function detail(Request $request)
    {
        $kategori = $request->kategori_ruangan;
        $kategoriname = Kategori::find($kategori);
        $aturan_mulai = $request->aturan_mulai;
        $aturan_akhir = $request->aturan_akhir;
//                dd($aturan_akhir);

        $rekap_user = Booking::leftJoin('booking_waktu as bw', 'bw.id_booking', '=', 'booking.id_booking')
            ->leftJoin('ruangan as r', 'r.id_ruangan', '=', 'bw.id_ruangan')
            ->leftJoin('users', 'users.id', '=', 'booking.id_pengguna')
            ->leftJoin('kategori as k', 'k.id_kategori_ruangan', '=', 'r.id_kategori_ruangan')
            ->leftJoin('admins as va', 'va.id', '=', 'bw.id_admin_verif')
            ->select('booking.id_booking', 'booking.instansi', 'booking.timestamp', 'booking.tujuan_pinjam', 'bw.start_date', 'bw.end_date', 'r.nm_ruangan', 'users.name as nama_peminjam', 'va.name as admin_verifikasi')
            ->where('bw.status_verif', '=', '1')
            ->whereBetween('bw.end_date',[$aturan_mulai, $aturan_akhir])
            ->where('k.id_kategori_ruangan',$kategori);

        $rekap = Booking::leftJoin('booking_waktu as bw', 'bw.id_booking', '=', 'booking.id_booking')
            ->leftJoin('ruangan as r', 'r.id_ruangan', '=', 'bw.id_ruangan')
            ->leftJoin('users', 'users.id', '=', 'booking.id_pengguna')
            ->leftJoin('kategori as k', 'k.id_kategori_ruangan', '=', 'r.id_kategori_ruangan')
            ->leftJoin('admins as va', 'va.id', '=', 'bw.id_admin_verif')
            ->select('booking.id_booking', 'booking.instansi', 'booking.timestamp', 'booking.tujuan_pinjam', 'bw.start_date', 'bw.end_date', 'r.nm_ruangan', 'users.name as nama_peminjam', 'va.name as admin_verifikasi')
            ->where('bw.status_verif', '=', '1')
            ->whereBetween('bw.end_date',[$aturan_mulai, $aturan_akhir])
            ->where('k.id_kategori_ruangan',$kategori);

        $rekap->union($rekap_user)
            ->orderBy('timestamp', 'asc');
//        dd($rekap);
        return view('admin.rekap.detail', array(
            'rekap' => $rekap->get(),
            'aturan_mulai' => $aturan_mulai,
            'aturan_akhir' => $aturan_akhir,
            'kategoriname' => $kategoriname
            
            
        ));
    }

}
