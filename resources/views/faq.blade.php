@extends('layouts.app')
@section('title', 'FAQ')
@section('faq-active', 'active')
@section('main-content')
    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/')  }}"><i class="fa fa-home"></i></a></li>
                    <li><a>FAQ</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->

    <section class="mv-main-body faqs-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="faqs-inner mv-box-shadow-gray-1 mv-bg-white">
                <div class="faqs-box mv-accordion-style-3">
                    <div id="accordion-faq" role="tablist" aria-multiselectable="true" class="panel-group">
                        <div class="panel panel-default">
                            <div role="tab" class="panel-heading"><a role="button" data-toggle="collapse"
                                                                     data-parent="#accordion-faq" href="#collapse-faq-1"
                                                                     aria-expanded="true">Bagaimana cara melakukan pendaftaran akun pengguna?</a></div>
                            <div id="collapse-faq-1" role="tabpanel" class="panel-collapse collapse in">
                                <div class="panel-body">Pada setiap halaman terdapat button DAFTAR, pengguna menekan button DAFTAR terlebih dahulu -> Masukkan informasi akun pendaftaran pengguna seperti Nama, NRP/NIP/NIK, Pengguna Internal/Eksternal, Email, Alamat, Nomor Telepon, dan Password. Jika anda pengguna eksternal, maka anda harus memasukkan Nomor KTP anda atau Nomor Induk Kependudukan.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div role="tab" class="panel-heading"><a role="button" data-toggle="collapse"
                                                                     data-parent="#accordion-faq" href="#collapse-faq-2"
                                                                     aria-expanded="false" class="collapsed">Apakah bisa melakukan peminjaman ruang tanpa memiliki akun?</a></div>
                            <div id="collapse-faq-2" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">Tidak bisa, pastikan anda memiliki akun pengguna terlebih dahulu dan masuk ke dalam sistem dengan menggunakan akun pengguna.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div role="tab" class="panel-heading"><a role="button" data-toggle="collapse"
                                                                     data-parent="#accordion-faq" href="#collapse-faq-3"
                                                                     aria-expanded="false" class="collapsed">Bagaimana cara melakukan pemesanan ruang? </a></div>
                            <div id="collapse-faq-3" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">Pastikan anda telah memiliki akun, kemudian masuk ke halaman layanan -> pilih ruang yang akan disewa -> Klik booking -> Masukkan informasi mengenai peminjaman ruang di halaman Booking (Nama, jadwal, tipe peminjam, Jenis keperluan, deskripsi tujuan peminjaman, upload surat peminjaman, dan upload bukti pembayaran hanya bagi pengguna eksternal ITS)
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div role="tab" class="panel-heading"><a role="button" data-toggle="collapse"
                                                                     data-parent="#accordion-faq" href="#collapse-faq-4"
                                                                     aria-expanded="false" class="collapsed">5.	Apakah bisa meminjam ruang pada Waktu yang sama dipinjam oleh pihak lain?</a></div>
                            <div id="collapse-faq-4" role="tabpanel" class="panel-collapse collapse">
                                <div class="panel-body">Tidak bisa, sistem akan otomatis memberitahukan bahwa pada tanggal, hari, dan jam yang sama ruang/lokasi telah ter-booked oleh pihak lain. Jadwal pada sistem juga akan secara otomatis memberitahukan bahwa pada waktu waktu tertentu yang telah dipinjam oleh pengguna dan disetujui oleh admin.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- .mv-main-body-->
@endsection