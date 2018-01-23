@extends('layouts.app')
@section('title', 'Booking Sukses')
@section('layanan-active', 'active')
@section('main-content')
    <section class="mv-main-body cart-empty-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="cart-empty-inner">
                <div class="mv-well-style-3 mv-box-shadow-gray-1 mv-bg-white mv-mb-30">
                    <div class="well-3-header text-center">
                        <div class="well-header-icon"><i class="icon-fa fa fa-check-circle"></i></div>
                        <div class="well-header-text">Booking ruangan telah dilakukan!</div>
                    </div>
                    <div class="well-3-body">
                        Proses peminjaman ruangan anda telah berhasil dilakukan. Silakan cek email atau dashboard anda untuk melihat status peminjaman telah disetujui atau tidak, have a nice day :)
                    </div>
                </div>

                <div class="cart-empty-footer text-center">
                    <a href="{{ url('layanan') }}" class="mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                        <span class="btn-inner">
                            <i class="btn-icon fa fa-cart-plus"></i>
                            <span class="btn-text">Kembali ke Layanan</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection