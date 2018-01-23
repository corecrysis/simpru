<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Ruangan;
use App\Model\Booking;
use App\Model\FotoRuangan;
use App\Model\RestriksiRuangan;


class LayananController extends Controller
{

    public function index()
    {
        //ambil data dari database
        $ruang = Ruangan::leftJoin('kategori', 'ruangan.id_kategori_ruangan', '=', 'kategori.id_kategori_ruangan')
            ->leftJoin((DB::raw("(select MIN(tmp_pict) as tmp_pict, id_ruangan from foto_ruangan group by id_ruangan) as p")), 'ruangan.id_ruangan', '=', 'p.id_ruangan')
            ->select('ruangan.*', 'p.tmp_pict', 'kategori.nm_kategori')
            ->where('status_ruangan', 'aktif')
            ->paginate(6);
        return view('layanan', [
            'data' => $ruang
        ]);
    }

    public function kategori($id)
    {
        //ambil data dari database
        $ruang = Ruangan::leftJoin('kategori', 'ruangan.id_kategori_ruangan', '=', 'kategori.id_kategori_ruangan')
            ->leftJoin((DB::raw("(select MIN(tmp_pict) as tmp_pict, id_ruangan from foto_ruangan group by id_ruangan) as p")), 'ruangan.id_ruangan', '=', 'p.id_ruangan')
            ->select('ruangan.*', 'p.tmp_pict', 'kategori.nm_kategori')
            ->where('status_ruangan', 'aktif')
            ->where('kategori.id_kategori_ruangan', $id)
            ->paginate(6);
        return view('layanan', [
            'data' => $ruang
        ]);
    }

    public function searchQuery(Request $request){

        if(is_numeric($request->q_cari)){
            $ruang = Ruangan::leftJoin('kategori', 'ruangan.id_kategori_ruangan', '=', 'kategori.id_kategori_ruangan')
                ->leftJoin((DB::raw("(select MIN(tmp_pict) as tmp_pict, id_ruangan from foto_ruangan group by id_ruangan) as p")), 'ruangan.id_ruangan', '=', 'p.id_ruangan')
                ->select('ruangan.*', 'p.tmp_pict', 'kategori.nm_kategori')
                ->where('ruangan.status_ruangan', 'aktif')
                ->where(function ($query)  use ($request) {
                    $query->where('ruangan.nm_ruangan', 'like', '%'.$request->q_cari.'%')
                        ->orWhere('ruangan.lokasi_ruangan', 'like', '%'.$request->q_cari.'%')
                        ->orWhere('kategori.nm_kategori', 'like', '%'.$request->q_cari.'%')
                        ->orWhere('ruangan.kapasitas', '>=', (int)$request->q_cari);
                })
                ->paginate(6);
        }
        else {
            $ruang = Ruangan::leftJoin('kategori', 'ruangan.id_kategori_ruangan', '=', 'kategori.id_kategori_ruangan')
                ->leftJoin((DB::raw("(select MIN(tmp_pict) as tmp_pict, id_ruangan from foto_ruangan group by id_ruangan) as p")), 'ruangan.id_ruangan', '=', 'p.id_ruangan')
                ->select('ruangan.*', 'p.tmp_pict', 'kategori.nm_kategori')
                ->where('ruangan.status_ruangan', 'aktif')
                ->where(function ($query)  use ($request) {
                    $query->where('ruangan.nm_ruangan', 'like', '%'.$request->q_cari.'%')
                        ->orWhere('ruangan.lokasi_ruangan', 'like', '%'.$request->q_cari.'%')
                        ->orWhere('kategori.nm_kategori', 'like', '%'.$request->q_cari.'%');
                })
                ->paginate(6);
        }

        $ruang->appends([
            'q_cari' => $request->q_cari,
        ]);

        return view('layanan', [
            'data' => $ruang
        ]);
    }

    public function searchKapasitas(Request $request){

        $ruang = Ruangan::leftJoin('kategori', 'ruangan.id_kategori_ruangan', '=', 'kategori.id_kategori_ruangan')
            ->leftJoin((DB::raw("(select MIN(tmp_pict) as tmp_pict, id_ruangan from foto_ruangan group by id_ruangan) as p")), 'ruangan.id_ruangan', '=', 'p.id_ruangan')
            ->select('ruangan.*', 'p.tmp_pict', 'kategori.nm_kategori')
            ->where('ruangan.status_ruangan', 'aktif')
            ->whereBetween('ruangan.kapasitas', [(int)$request->minVal, (int)$request->maxVal])
            ->paginate(6);

        $ruang->appends([
            'minVal' => $request->input('minVal'),
            'maxVal' => $request->input('maxVal')
        ]);

        return view('layanan', [
            'data' => $ruang
        ]);
    }

    public function searchDate(Request $request){
        $ruang = Ruangan::leftJoin('kategori', 'ruangan.id_kategori_ruangan', '=', 'kategori.id_kategori_ruangan')
            ->leftJoin((DB::raw("(select MIN(tmp_pict) as tmp_pict, id_ruangan from foto_ruangan group by id_ruangan) as p")), 'ruangan.id_ruangan', '=', 'p.id_ruangan')
            ->select('ruangan.*', 'p.tmp_pict', 'kategori.nm_kategori')
            ->where('ruangan.status_ruangan', 'aktif')
            ->whereNotIn('ruangan.id_ruangan', function ($query) use ($request){
                $query->select('id_ruangan')
                    ->from('booking_waktu')
                    ->whereRaw("'".$request->tanggal."' BETWEEN start_date AND end_date ")
                    ->groupBy(['id_ruangan']);
            })
            ->paginate(6);

        $ruang->appends([
            'tanggal' => $request->tanggal,
        ]);

        return view('layanan', [
            'data' => $ruang
        ]);
    }

    //JADWAL
    public function  detail($id_ruangan, Request $request){
        //detail ruangan
        $ruang = Ruangan::leftJoin('kategori', 'ruangan.id_kategori_ruangan', '=', 'kategori.id_kategori_ruangan')
            ->select('ruangan.*', 'kategori.nm_kategori')
            ->where('status_ruangan', 'aktif')
            ->where('ruangan.id_ruangan', $id_ruangan)
            ->first();

        //foto ruangan
        $foto = FotoRuangan::where('id_ruangan', $id_ruangan)->get();

        //detail jadwal ruangan
        $jadwal_database = $this->getJadwal($id_ruangan);
        $jadwal_session = $this->getSessionJadwal($id_ruangan, $request);
        $jadwal = json_encode(array_merge($jadwal_database, $jadwal_session));

        //aturan ruangan
        $aturan = json_encode($this->getAturanRuang($id_ruangan));

        return view('detail_layanan', [
            'id' => $id_ruangan,
            'ruang' => $ruang,
            'foto' => $foto,
            'jadwal' => $jadwal,
            'aturan' => $aturan
        ]);
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
        if ($request->session()->has('user.ruang_book')) {
            $ruang = $request->session()->get('user.ruang_book');
//            var_dump($id_ruangan);
            foreach ($ruang as $d) {
                if ($d['id_ruangan'] == $id_ruangan) {
                    $arr = [];
                    $arr['editable'] = true;
                    $arr['durationEditable'] = true;
//                    $arr['color'] = '#24af90';
                    $arr['className'] = 'schedule-event';
                    $arr['id'] = $d['rowId'];
                    $arr['title'] = '';
                    $arr['start'] = date('c', strtotime($d['start_date']));
                    $arr['end'] = date('c', strtotime($d['end_date']));
                    array_push($data_json, $arr);
                }
            }
        }
        return $data_json;
    }

    public function getAllSessionJadwal($request)
    {
        $data_json = [];
        if ($request->session()->has('user.ruang_book')) {
            $ruang = $request->session()->get('user.ruang_book');
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
        if ($request->session()->has('user.ruang_book')) {
            $ruang = $request->session()->get('user.ruang_book');
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
                        $arr['description'] = 'Jika ingin merubah waktu, tutup pop up dan pilih peminjaman ke-'.$i.' anda. ';
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
