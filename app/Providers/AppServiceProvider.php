<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Model\Kategori;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //pembatalan otomatis
        $this->automaticCancelation();

        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            //passing variable cart peminjaman
            $ruang = [];

            if (Session::has('user.ruang_book')) {
                $ruang = Session::get('user.ruang_book');
            }

            $view->with('items_book', $ruang)->with('total_book', count($ruang))->with('data_kategori', $this->getAllKategori());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function automaticCancelation()
    {
        $bw = DB::table('booking_waktu')
            ->where('status_verif', '=', '0')
            ->where('expired_at', '<=', date('Y-m-d H:i:s'));

        $bw->update(['status_verif' => '3', 'keterangan' => 'Batal karena tidak menyelesaikan administrasi dalam waktu maskimal 2 hari setelah peminjaman']);

        foreach ($bw->get() as $b) {
            $booking = DB::table('booking')
                ->leftJoin('booking_waktu', 'booking.id_booking', '=', 'booking_waktu.id_booking')
                ->leftJoin('users', 'booking.id_pengguna', '=', 'users.id')
                ->leftJoin('ruangan', 'ruangan.id_ruangan', '=', 'booking_waktu.id_ruangan')
                ->select('booking.*', 'booking_waktu.*', 'users.name', 'users.email', 'ruangan.nm_ruangan')
                ->where('booking_waktu.id_booking_waktu', $b->id_booking_waktu)
                ->first()
                ->toArray();

            $booking['status_verif_text'] = 'Batal Ototmatis';
            $booking['color'] = 'red';

            Mail::send('admin.emails.verif_book', ['data' => $booking], function ($m) use ($booking) {
                $m->from('simpru.its@gmail.com', 'SIMPRU ITS');

                $m->to($booking['email'], $booking['name'])->subject('Verifikasi peminjaman ruangan | SIMPRU');
            });
        }

    }

    public function getAllKategori(){
        //passing variable kategori
        $data_kategori = [];
        //masukkan fakultas
        $fakultas = Kategori::where('jenis_kategori', '=', 'fakultas')->where('status_kategori','=','aktif')->get();
        foreach ($fakultas as $fak) {
            $departemen = Kategori::where('jenis_kategori', '=', 'departemen')
                ->where('parent1', '=', $fak->id_kategori_ruangan)->where('status_kategori','=','aktif')
                ->get();
            $data_kategori[$fak->singkatan_kategori] = ['nama' => $fak->nm_kategori, 'id' => $fak->id_kategori_ruangan, 'items' => $departemen];
        }
        //masukkan sarpras
        $sarpras = Kategori::where('jenis_kategori', '=', 'sarpras')->where('status_kategori','=','aktif')->get();
        $data_kategori['SARPRAS'] = ['nama' => 'Sarana dan Prasarana', 'id' => 0, 'items' => $sarpras];
        
        return $data_kategori;
    }
}
