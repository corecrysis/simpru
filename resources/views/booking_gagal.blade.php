@extends('layouts.app')
@section('title', 'Booking Gagal')
@section('layanan-active', 'active')
@section('main-content')
    <section class="mv-main-body cart-empty-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="cart-empty-inner">
                <div class="mv-well-style-3 mv-box-shadow-gray-1 mv-bg-white mv-mb-30">
                    <div class="well-3-header text-center">
                        <div class="well-header-icon"><i class="icon-fa fa fa-remove"></i></div>
                        <div class="well-header-text">Booking gagal dilakukan</div>
                    </div>
                    <div class="well-3-body">
                        Mohon maaf proses pembookingan anda gagal, silakan coba lagi
                    </div>
                </div>

                <div class="cart-empty-footer text-center">
                    <a href="{{ url('layanan') }}" class="mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                        <span class="btn-inner">
                            <i class="btn-icon fa fa-cart-plus"></i>
                            <span class="btn-text">Pinjam Lagi</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection