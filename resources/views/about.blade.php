@extends('layouts.app')
@section('title', 'About')
@section('about-active', 'active')
@section('main-content')
    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a>Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->

    <section class="mv-main-body about-us-main mv-bg-pattern-subtle mv-wrap" style="padding-bottom:0">
        <div class="about-us-inner">
            <div class="block-our-story">
                <div class="container">
                    <div class="mv-block-style-34 mv-bg-white mv-box-shadow-gray-1">
                        <div class="block-34-inner">
                            <div class="block-34-title">
                                <div class="text-main">SIMPRU</div>
                                <div class="text-sub">Apa itu SIMPRU?</div>
                            </div>
                            <div class="block-34-box">
                                <div class="block-34-box-inner mv-col-wrapper">
                                    <div class="mv-col-left block-34-thumb"><span
                                                style=""
                                                class="block-34-thumb-img"></span></div>
                                    <div class="mv-col-right block-34-main">
                                        <div class="block-34-content">SIMPRU adalah Sistem Manajemen dan Peminjaman
                                            Ruangan ITS
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .mv-block-style-34-->
                </div>
            </div>
            <!-- .block-our-story-->

        </div>
    </section>
@endsection