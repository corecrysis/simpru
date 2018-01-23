<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Model\Ruangan;
use App\Model\Kategori;
use App\Model\RestriksiRuangan;
use App\Model\Booking;
use App\Model\FotoRuangan;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LayananController as Layanan;

class RuangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function getLayanan()
    {
        $layanan = new Layanan();
        return $layanan;
    }

    public function index()
    {
//        $ruangan = Ruangan::all();
        if(Auth::user()->id_kategori == '0'){
            $ruangan = Ruangan::leftJoin('kategori as ka', 'ka.id_kategori_ruangan', '=', 'ruangan.id_kategori_ruangan')
                ->where('ka.jenis_kategori', 'sarpras')->get();
        }
        else if (Auth::user()->id_kategori != ''){
            $ruangan = Ruangan::where('id_kategori_ruangan', Auth::user()->id_kategori)->get();
        }
        else {
            $ruangan = Ruangan::all();
        }

//        dd($ruangan);
        return view('admin.ruang.view', array(
            'ruangan' => $ruangan
        ));
    }

    public function createaturanRuangan($id)
    {
        $ruangan = Ruangan::find($id);
        return view('admin.ruang.create_aturan', array(
            'ruangan' => $ruangan
        ));
    }

    public function createRuangan()
    {
        $kategori = Kategori::All();
        return view('admin.ruang.create', array(
            'kategori' => $kategori
        ));
    }

    public function insertaturanRuangan(Request $request)
    {
        if ($request->aturan_akhir == '00:00') {
            $request->aturan_akhir = '24:00';
        }
        $resruangan = new RestriksiRuangan;
        $resruangan->hari_ruangan = $request->hari_ruangan;
        $resruangan->waktu_aturan_mulai = $request->aturan_mulai;
        $resruangan->waktu_selesai = $request->aturan_akhir;
        $resruangan->id_ruangan = $request->id_ruangan;

        $resruangan->save();
        return redirect('/admin/ruang');
    }

    public function insertRuangan(Request $request)
    {
        $filename_foto1 = null;
        $filename_foto2 = null;
        $filename_foto3 = null;
        $filename_foto4 = null;
//var_dump($_POST);
//        die();
        $validation = Validator::make(Input::all(),
            array(
                'nm_ruangan' => 'required|max:254',
                'kapasitas' => 'required|max:4',
                'detail_ruangan' => 'required|max:2048',
                'fasilitas_ruangan' => 'required|max:2048',
                'ketentuan_ruangan' => 'required|max:2048',
                'lokasi_ruangan' => 'required|max:128',
                'no_hp_ruangan' => 'required|numeric',
                'status_ruangan' => 'required|max:20',
                'id_kategori_ruangan' => 'required|numeric',
                'foto_1' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                'foto_2' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                'foto_3' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                'foto_4' => 'nullable|mimes:jpg,png,jpeg|max:2048',
            )
        );
//        dd($validation);
        if ($validation->fails()) {
//            dd($validation->messages());
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
            $ruangan = new Ruangan;
            $ruangan->nm_ruangan = $request->nm_ruangan;
            $ruangan->kapasitas = $request->kapasitas;
            $ruangan->detail_ruangan = $request->detail_ruangan;
            $ruangan->fasilitas_ruangan = $request->fasilitas_ruangan;
            $ruangan->ketentuan_ruangan = $request->ketentuan_ruangan;
            $ruangan->lokasi_ruangan = $request->lokasi_ruangan;
            $ruangan->no_hp_ruangan = $request->no_hp_ruangan;
            $ruangan->status_ruangan = $request->status_ruangan;
            $ruangan->id_kategori_ruangan = (int)$request->id_kategori_ruangan;
            if ($ruangan->save()) {
                $check = true;
                if ($request->file('foto_1') != null) {
                    $fruang1 = new FotoRuangan;
                    $fruang1->id_ruangan = $ruangan->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_1')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto1 = $file[0] . '_' . Auth::user()->id . '_' . time() . '.' . $file[1];
                    $fruang1->tmp_pict = $filename_foto1;

                    if ($fruang1->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    $request->file('foto_1')->move($destination, $filename_foto1);
                }
                if ($request->file('foto_2') != null) {
                    $fruang2 = new FotoRuangan;
                    $fruang2->id_ruangan = $ruangan->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_2')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto2 = $file[0] . '_' . Auth::user()->id . '_' . time() . '.' . $file[1];
                    $fruang2->tmp_pict = $filename_foto2;
                    if ($fruang2->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    $request->file('foto_2')->move($destination, $filename_foto2);
                }
                if ($request->file('foto_3') != null) {
                    $fruang3 = new FotoRuangan;
                    $fruang3->id_ruangan = $ruangan->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_3')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto3 = $file[0] . '_' . Auth::user()->id . '_' . time() . '.' . $file[1];
                    $fruang3->tmp_pict = $filename_foto3;
                    if ($fruang3->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    $request->file('foto_3')->move($destination, $filename_foto3);
                }
                if ($request->file('foto_4') != null) {
                    $fruang4 = new FotoRuangan;
                    $fruang4->id_ruangan = $ruangan->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_4')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto4 = $file[0] . '_' . Auth::user()->id . '_' . time() . '.' . $file[1];
                    $fruang4->tmp_pict = $filename_foto4;
                    if ($fruang4->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    $request->file('foto_4')->move($destination, $filename_foto4);
                }
                if ($check) {
                    return redirect('/admin/ruang')->with('messages', ['Ruangan telah berhasil ditambahkan', 'success', 'check']);
                } else {
                    return redirect('/admin/ruang')->with('messages', ['Ruangan tidak berhasil ditambahkan!', 'danger', 'times']);
                }
            }
            return redirect('/admin/ruang');
        }
    }

    public function editRuangan($id)
    {
        $ruangan = Ruangan::find($id);
        $fruangan = FotoRuangan::where('id_ruangan', $id)->get();
//        dd($fruangan);
        $kategori = Kategori::All();
        return view('admin.ruang.edit', array(
            'ruangan' => $ruangan,
            'kategori' => $kategori,
            'fruangan' => $fruangan,
        ));
    }

    public function editAturan($id)
    {
        $aturan = RestriksiRuangan::find($id);
        return view('admin.ruang.edit_aturan', array(
            'aturan' => $aturan,
        ));
    }

    public function viewdetailRuangan($id, Request $request)
    {
        $click_tab = '';
        if ($request->pil == 'jadwal') {
            $click_tab = '$("#jadwal_button").click();';
        }
        $ruangan = Ruangan::join('kategori as kx', 'kx.id_kategori_ruangan', '=', 'ruangan.id_kategori_ruangan')->select('ruangan.id_ruangan', 'ruangan.nm_ruangan', 'ruangan.kapasitas', 'ruangan.detail_ruangan', 'ruangan.lokasi_ruangan', 'ruangan.no_hp_ruangan', 'ruangan.fasilitas_ruangan', 'ruangan.ketentuan_ruangan', 'kx.nm_kategori', 'ruangan.status_ruangan')->where('ruangan.id_ruangan', '=', $id)->first();
        $aturan = RestriksiRuangan::where('id_ruangan', $id)->get();
        $foto = FotoRuangan::where('id_ruangan', $id)->get();

        //detail jadwal ruangan
        $jadwal_json = json_encode($this->getLayanan()->getJadwal($id));
        //aturan ruangan
        $aturan_json = json_encode($this->getLayanan()->getAturanRuang($id));

        return view('admin.ruang.detail', array(
            'ruangan' => $ruangan,
            'aturan' => $aturan,
            'foto' => $foto->toArray(),
            'jadwal_json' => $jadwal_json,
            'aturan_json' => $aturan_json,
            'click_tab' => $click_tab
        ));
    }

    public function aktifRuangan(Request $request, $id_ruangan)
    {
        $ruanganupdate = Ruangan::find($id_ruangan);
        $ruanganupdate->status_ruangan = 'aktif';
        $ruanganupdate->save();
        //        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return redirect()->back();

    }

    public function nonaktifRuangan(Request $request, $id_ruangan)
    {
        $ruanganupdate = Ruangan::find($id_ruangan);
        $ruanganupdate->status_ruangan = 'non_aktif';
        $ruanganupdate->save();
        //        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return redirect()->back();
    }

    public function updateRuangan(Request $request, $id_ruangan)
    {
        $filename_foto1 = null;
        $filename_foto2 = null;
        $filename_foto3 = null;
        $filename_foto4 = null;
        $validation = Validator::make(Input::all(),
                                      array(
                                          'nm_ruangan' => 'required|max:254',
                                          'kapasitas' => 'required|max:4',
                                          'detail_ruangan' => 'required|max:2048',
                                          'fasilitas_ruangan' => 'required|max:2048',
                                          'ketentuan_ruangan' => 'required|max:2048',
                                          'lokasi_ruangan' => 'required|max:128',
                                          'no_hp_ruangan' => 'required|numeric',
                                          'status_ruangan' => 'required|max:20',
                                          'id_kategori_ruangan' => 'required|numeric',
                                          'foto_1' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                                          'foto_2' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                                          'foto_3' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                                          'foto_4' => 'nullable|mimes:jpg,png,jpeg|max:2048',
                                      )
                                     );
        if ($validation->fails()) {
//                        dd($validation->messages());
            //withInput keep the users info
            return Redirect::back()->withInput()->withErrors($validation->messages());
        } else {
        $ruanganupdate = Ruangan::find($id_ruangan);
        $ruanganupdate->nm_ruangan = $request->nm_ruangan;
        $ruanganupdate->status_ruangan = $request->status_ruangan;
        $ruanganupdate->kapasitas = $request->kapasitas;
        $ruanganupdate->detail_ruangan = $request->detail_ruangan;
        $ruanganupdate->fasilitas_ruangan = $request->fasilitas_ruangan;
        $ruanganupdate->ketentuan_ruangan = $request->ketentuan_ruangan;
        $ruanganupdate->lokasi_ruangan = $request->lokasi_ruangan;
        $ruanganupdate->no_hp_ruangan = $request->no_hp_ruangan;
        $ruanganupdate->id_kategori_ruangan = $request->id_kategori_ruangan;
//        $ruanganupdate->save();
            if($ruanganupdate->save()){
                
                $check = true;
                if ($request->file('foto_1') != null) {
                    $fruangan1 = FotoRuangan::where('id_ruangan', $ruanganupdate->id_ruangan)->get();
                    $fruang1 = new FotoRuangan;
                    
                    $fruang1->id_ruangan = $ruanganupdate->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_1')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto1 = $file[0] . '_' . Auth::user()->id .'_'. time() . '.' . $file[1];
                    if(isset($fruangan1[0])){
                        unlink(public_path('/images/simpru/') . $fruangan1[0]->tmp_pict);
                        $deletedRows = FotoRuangan::where('id_foto_ruangan', $fruangan1[0]->id_foto_ruangan)->delete();
                    }
                    $fruang1->tmp_pict = $filename_foto1;

                    if ($fruang1->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    
                    $request->file('foto_1')->move($destination, $filename_foto1);
                }
                if ($request->file('foto_2') != null) {
                    $fruangan2 = FotoRuangan::where('id_ruangan', $ruanganupdate->id_ruangan)->get();
                    $fruang2 = new FotoRuangan;
                    $fruang2->id_ruangan = $ruanganupdate->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_2')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto2 = $file[0] . '_' . Auth::user()->id .'_'. time() . '.' . $file[1];
                    if(isset($fruangan1[1])) {
                        unlink(public_path('/images/simpru/') . $fruangan2[1]->tmp_pict);
                        $deletedRows = FotoRuangan::where('id_foto_ruangan', $fruangan2[1]->id_foto_ruangan)->delete();
                    }

                    $fruang2->tmp_pict = $filename_foto2;
                    if ($fruang2->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    $request->file('foto_2')->move($destination, $filename_foto2);
                }
                if ($request->file('foto_3') != null) {
                    $fruangan3 = FotoRuangan::where('id_ruangan', $ruanganupdate->id_ruangan)->get();
                    $fruang3 = new FotoRuangan;
                    $fruang3->id_ruangan = $ruanganupdate->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_3')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto3 = $file[0] . '_' . Auth::user()->id .'_'. time() . '.' . $file[1];
                    if(isset($fruangan1[2])){
                        unlink(public_path('/images/simpru/') . $fruangan3[2]->tmp_pict);
                        $deletedRows = FotoRuangan::where('id_foto_ruangan', $fruangan3[2]->id_foto_ruangan)->delete();
                    }

                    $fruang3->tmp_pict = $filename_foto3;
                    if ($fruang3->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    $request->file('foto_3')->move($destination, $filename_foto3);
                }
                if ($request->file('foto_4') != null) {
                    $fruangan4 = FotoRuangan::where('id_ruangan', $ruanganupdate->id_ruangan)->get();
                    $fruang4 = new FotoRuangan;
                    $fruang4->id_ruangan = $ruanganupdate->id_ruangan;
                    //upload bukti
                    $destination = public_path('/images/simpru/');
                    //                $destination = storage_path('/app/public/user/bukti/123');
                    $file_req = $request->file('foto_4')->getClientOriginalName();
                    $file = explode('.', $file_req);
                    $filename_foto4 = $file[0] . '_' . Auth::user()->id .'_'. time() . '.' . $file[1];
                    if(isset($fruangan1[3])){
                        unlink(public_path('/images/simpru/') . $fruangan4[3]->tmp_pict);
                        $deletedRows = FotoRuangan::where('id_foto_ruangan', $fruangan4[3]->id_foto_ruangan)->delete();
                    }
                    $fruang4->tmp_pict = $filename_foto4;
                    if ($fruang4->save()) {
                        $check = true;
                    } else {
                        $check = false;
                    }
                    $request->file('foto_4')->move($destination, $filename_foto4);
                }
                if ($check) {
                    return redirect('/admin/ruang')->with('messages',['Ruangan telah berhasil diubah', 'success', 'check']);
                } else {
                    return redirect('/admin/ruang')->with('messages',['Ruangan tidak berhasil diubah!', 'danger', 'times']);
                }
            
            }
        return redirect()->back();
        }

    }

    public function updateAturan(Request $request, $id)
    {
        $resruangan = RestriksiRuangan::find($id);
        if ($request->aturan_akhir == '00:00') {
            $request->aturan_akhir = '24:00';
        }
        $resruangan->hari_ruangan = $request->hari_ruangan;
        $resruangan->waktu_aturan_mulai = $request->aturan_mulai;
        $resruangan->waktu_selesai = $request->aturan_akhir;
        $resruangan->id_ruangan = $request->id_ruangan;

        $resruangan->save();
        return redirect()->back();
    }

    public function deleteRuangan($id)
    {
        $ruangandelete = Ruangan::find($id);
        if( $ruangandelete->delete()){
            $foto = FotoRuangan::where('id_ruangan', $id)->get();
            foreach($foto as $f){
                unlink(public_path('/images/simpru/') . $f->tmp_pict);
                $deletedRows = FotoRuangan::where('id_foto_ruangan', $f->id_foto_ruangan)->delete();
            }
        }
        return redirect()->back();

    }

    public function deleteAturan($id)
    {
        $restriksi = RestriksiRuangan::find($id);
        $restriksi->delete();
        return redirect()->back();

    }
}
