<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\BlacklistPengguna;
use App\Model\User;
use App\Model\Admin;
use App\Model\Kategori;
use App\Model\RestriksiRuangan;
use App\Http\Controllers\Controller;

class BlacklistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        
        $blacklistpengguna = BlacklistPengguna::join('users as px', 'px.id', '=', 'blacklist_pengguna.id_pengguna')->join('admins as ax', 'ax.id', '=', 'blacklist_pengguna.id_admin')->select('blacklist_pengguna.nm_blacklist', 'px.name', 'ax.name','ax.id')->paginate(5);
//        dd($blacklistpengguna);
        return view('admin.blacklistpengguna.view', array(
            'blacklistpengguna' => $blacklistpengguna
        ));
    }

    public function createaturanRuangan($id)
    {
        $ruangan = Ruangan::find($id);
        return view('admin.blacklistpengguna.create_aturan', array(
            'ruangan' => $ruangan
        ));
    }
    public function createBlacklistpengguna()
    {
        $blacklistpengguna = User::All();
        return view('admin.blacklistpengguna.create', array(
            'blacklistpengguna' => $blacklistpengguna
        ));
    }
    public function insertblpengguna(Request $request)
    {
        $blpengguna = new BlacklistPengguna;
        $blpengguna->nm_blacklist = $request->keterangan;
        $blpengguna->id_pengguna = $request->id_pengguna;
        $blpengguna->id_admin = Auth::user()->id;
        

        $blpengguna->save();
        // $last2 = DB::table('Ruangan')->orderBy('id_ruangan', 'DESC')->first();
        //        $restriksi = new RestriksiRuangan;
        //        $restriksi->id_ruangan = $ruangan->id_ruangan;
        //        $restriksi->waktu_restriksi_mulai = $request->waktu_restriksi_mulai;
        //        $restriksi->waktu_restriksi_selesai = $request->waktu_restriksi_selesai;
        //        $restriksi->save();
        return $this->index();
    }

    

    public function editblpengguna($id)
    {
        $blacklistpengguna = BlacklistPengguna::find($id);
        $pengguna = Pengguna::All();
        //          dd($kategori->nm_kategori);
        return view('admin.blacklistpengguna.edit', array(
            'blacklistpengguna' => $blacklistpengguna,
            'pengguna' => $pengguna
        ));
    }
    

    public function updateblpengguna(Request $request, $id_blacklist)
    {
        $blpengguna = BlacklistPengguna::find($id_blacklist);
        $blpengguna->nm_blacklist = $request->nm_blacklist;
        $blpengguna->id_pengguna = $request->id_pengguna;
        
        $blpengguna->save();
        return $this->index();

    }

    public function deleteblpengguna($id)
    {
        $ruangandelete = BlacklistPengguna::find($id);
        $ruangandelete->delete();
        return $this->index();

    }
}
