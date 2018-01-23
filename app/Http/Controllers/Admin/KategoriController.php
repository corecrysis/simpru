<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Kategori;
use App\Model\Booking;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getAllJadwal()
    {
        $data_json = [];
        $data = Booking::leftJoin('booking_waktu', 'booking.id_booking', '=', 'booking_waktu.id_booking')
            ->leftJoin('ruangan', 'booking_waktu.id_ruangan', '=', 'ruangan.id_ruangan')
            ->select('booking.*', 'booking_waktu.*', 'ruangan.nm_ruangan')
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
        return [$data_json, $data];
    }

    public function home()
    {
        $ambil = $this->getAllJadwal();
        $data = $ambil[0];
        $data2 = $ambil[1];
        return view('admin.home', array(
            'event' => json_encode($data),
            'tabel' => $data2
        ));
    }
    public function index()
    {
        $kategori = Kategori::all();
        // dd($appstore);
        return view('admin.kategori.view', array(
            'kategori' => $kategori
        ));
    }

    public function createKategori()
    {
        $kategori = Kategori::where('parent1', 0)->get();
        return view('admin.kategori.create', array(
            'kategori' => $kategori
        ));
    }
    public function createdeptKategori()
    {
        $kategori = Kategori::where('parent1', 0)->get();
        return view('admin.kategori.create_dept', array(
            'kategori' => $kategori
        ));
    }

    public function insertKategori(Request $request)
    {
        //   dd($request);

        $kategoria = new Kategori;
        $kategoria->nm_kategori = $request->nm_kategori;
        $kategoria->singkatan_kategori = $request->singkatan_kategori;
        if($request->pilih_kategori=='fakultas'){
            $kategoria->parent1 = $request->pil_fakultas;
        } else if($request->pilih_kategori=='departemen'){
            $kategoria->parent1 = $request->select_fakultas;
        } else if($request->pilih_kategori=='sarpras'){
            $kategoria->parent1 = $request->pil_fasilitas;
        }
        $kategoria->jenis_kategori = $request->pilih_kategori;
        $kategoria->status_kategori = $request->status_kategori;
        $kategoria->save();
        return $this->index();
    }

    public function editKategori($id)
    {
        $kategori = Kategori::find($id);
        $kategori_parent = Kategori::where('parent1', 0)->get();
//        dd($kategori);
        return view('admin.kategori.edit', array(
            'kategori' => $kategori,
            'kategori_parent' => $kategori_parent
        ));
    }

    public function aktifKategori(Request $request, $id_kategori_ruangan)
    {
        $kategoriupdate = Kategori::find($id_kategori_ruangan);
        $kategoriupdate->status_kategori = 'aktif';
        $kategoriupdate->save();
//        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return $this->index();

    }

    public function nonaktifKategori(Request $request, $id_kategori_ruangan)
    {
        $kategoriupdate = Kategori::find($id_kategori_ruangan);
        $kategoriupdate->status_kategori = 'tidak_aktif';
        $kategoriupdate->save();
//        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return $this->index();

//        return view('admin.kategori.view', array(
//            'kategori' => $kategori
//        ));
    }

    public function updateKategori(Request $request, $id_kategori_ruangan)
    {
        $kategoriupdate = Kategori::find($id_kategori_ruangan);
        $kategoriupdate->nm_kategori = $request->nm_kategori;
        $kategoriupdate->singkatan_kategori = $request->singkatan_kategori;
        if($request->pilih_kategori=='fakultas'){
            $kategoriupdate->parent1 = $request->pil_fakultas;
        } else if($request->pilih_kategori=='departemen'){
            $kategoriupdate->parent1 = $request->select_fakultas;
        } else if($request->pilih_kategori=='fasilitas_umum'){
            $kategoriupdate->parent1 = $request->pil_fasilitas;
        }
        $kategoriupdate->status_kategori = $request->status_kategori;
        $ax = $kategoriupdate->save();
//        dd($kategoriupdate);
//        dd($ax);
        return $this->index();

    }

    public function deleteKategori($id)
    {
        $kategoridelete = Kategori::find($id);
        $kategoridelete->delete();
        return $this->index();

    }
}
