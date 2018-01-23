<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Http\Controllers\Controller;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pengguna = User::all();
        // dd($appstore);
        return view('admin.pengguna.view', array(
            'pengguna' => $pengguna
        ));
    }

    public function createPengguna()
    {
        return view('admin.pengguna.create');
    }

    public function insertPengguna(Request $request)
    {
        //   dd($request);

        $pengguna = new User;
        if ($request->password_pengguna == $request->password_pengguna_konfirmasi) {
            $pengguna->password = Hash::make($request->password_pengguna);

            $pengguna->name = $request->username;
//        $pengguna->password_pengguna = $request->password_pengguna;
            $pengguna->no_hp = $request->no_hp;
            $pengguna->identifier = $request->nrp_pengguna;
            $pengguna->email = $request->email_pengguna;
           
            $pengguna->keanggotaan = 'eksternal';
            $pengguna->save();
            return $this->index();
        } else {
            return $this->createPengguna();
        }
    }

    public function editPengguna($id)
    {
        $pengguna = User::find($id);
        //          dd($kategori->nm_kategori);
        return view('admin.pengguna.edit', array(
            'pengguna' => $pengguna
        ));
    }

    public function aktifPengguna(Request $request, $id_pengguna)
    {
        $pengguna = User::find($id_pengguna);
        $pengguna->status_pengguna = '1';
        $pengguna->save();
        //        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return $this->index();

    }

    public function nonaktifPengguna(Request $request, $id_pengguna)
    {
        $pengguna = User::find($id_pengguna);
        $pengguna->status_pengguna = '0';
        $pengguna->save();
        //        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return $this->index();

        //        return view('admin.kategori.view', array(
        //            'kategori' => $kategori
        //        ));
    }

    public function updatePengguna(Request $request, $id_pengguna)
    {
        $pengguna = User::find($id_pengguna);
        if ($request->password_pengguna == $request->password_pengguna_konfirmasi) {
            $pengguna->password = Hash::make($request->password_pengguna);


            $pengguna->name = $request->username;
//        $pengguna->password_pengguna = $request->password_pengguna;
            $pengguna->no_hp = $request->no_hp;
            $pengguna->identifier = $request->nrp_pengguna;
            $pengguna->email = $request->email_pengguna;

            $pengguna->keanggotaan = 'eksternal';
            $pengguna->save();
            return $this->index();
        } else {
            return $this->editPengguna($id_pengguna);
        }
    }

    public function deletePengguna($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();
        return $this->index();

    }
}
