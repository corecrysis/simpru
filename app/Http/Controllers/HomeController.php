<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kategori;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MOVED TO APPSERVICEPROVIDER
//        $data = [];
//        //masukkan fakultas
//        $fakultas = Kategori::where('jenis_kategori','=','fakultas')->get();
//        foreach ($fakultas as $fak){
//            $departemen = Kategori::where('jenis_kategori','=','departemen')
//                ->where('parent1', '=', $fak->id_kategori_ruangan)
//                ->get();
//            $data[$fak->singkatan_kategori] = $departemen;
//        }
//        //masukkan sarpras
//        $sarpras = Kategori::where('jenis_kategori','=','sarpras')->get();
//        $data['SARPRAS'] = $sarpras;

//        dd($data);
        return view('home', [
//            'data' => $data
        ]);
    }
}
