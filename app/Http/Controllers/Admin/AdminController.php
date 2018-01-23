<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Admin::all();
        // dd($appstore);
        return view('admin.administrator.view', array(
            'administrator' => $admin
        ));
    }

    public function createAdmin()
    {
        return view('admin.administrator.create');
    }

    public function insertAdmin(Request $request)
    {
        //   dd($request);
        
        $admin = new Admin;
        if ($request->pass_admin == $request->pass_admin_konfirmasi) {
            $admin->password = Hash::make($request->pass_admin);
            $admin->name = $request->name;
            $admin->no_hp = $request->no_hp;
            $admin->identifier = $request->nik_admin;
            $admin->email = $request->email_admin;
            $admin->status_admin = $request->status_admin;
           
            $admin->save();
        } else {
            return $this->createAdmin();
        }
        

        return $this->index();
    }

    public function editAdmin($id)
    {
        $admin = Admin::find($id);
        //          dd($kategori->nm_kategori);
        return view('admin.administrator.edit', array(
            'administrator' => $admin
        ));
    }
    public function aktifAdmin(Request $request, $id_pengguna)
    {
        $pengguna = Admin::find($id_pengguna);
        $pengguna->status = '1';
        $pengguna->save();
        //        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return $this->index();

    }

    public function nonaktifAdmin(Request $request, $id_pengguna)
    {
        $pengguna = Admin::find($id_pengguna);
        $pengguna->status = '0';
        $pengguna->save();
        //        $kategori = Kategori::paginate(5);
        // dd($appstore);
        return $this->index();

        //        return view('admin.kategori.view', array(
        //            'kategori' => $kategori
        //        ));
    }
    public function updateAdmin(Request $request, $id_admin)
    {
        $adminupdate = Admin::find($id_admin);
        if ($request->password_admin == $request->password_admin_konfirmasi) {
            $adminupdate->password = Hash::make($request->password_admin);
            $adminupdate->no_hp = $request->no_hp;
            $adminupdate->name = $request->name;
            $adminupdate->identifier = $request->nik_admin;
            $adminupdate->email = $request->email_admin;
            $adminupdate->status_admin = $request->status_admin;
            
            $adminupdate->save();
        } else {
            return $this->editAdmin($id_admin);
        }
        
        return $this->index();

    }

    public function deleteAdmin($id)
    {
        $admindelete = Admin::find($id);
        $admindelete->delete();
        return $this->index();

    }
}
