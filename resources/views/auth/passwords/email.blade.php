@extends('layouts.app')

@section('content')
    <section class="main-banner mv-wrap">
        <div data-image-src="images/background/demo_bg_1920x1680.png"
             class="mv-banner-style-1 mv-bg-overlay-dark overlay-0-85 mv-parallax">
            <div class="page-name mv-caption-style-6">
                <div class="container">
                    <div class="mv-title-style-9"><span class="main">Lupa Password</span><img
                                src="images/icon/icon_line_polygon_line.png" alt="icon" class="line"/></div>
                </div>
            </div>
        </div>
    </section>
    <!-- .main-banner-->

    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a>Lupa Password</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->

    <section class="mv-main-body forgot-password-main mv-bg-gray mv-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="mv-form-style-1 mv-box-shadow-gray-1">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}" class="form-forgot-password">
                            {{ csrf_field() }}
                            <div class="form-header">
                                <div class="mv-title-style-13">
                                    <div class="text-main">Lupa Password?</div>
                                    <div class="text-sub">Masukkan alamat email untuk mereset password. Jika tidak ada
                                        di kotak masuk, coba pastikan cek folder spam anda.
                                    </div>
                                </div>
                            </div>
                            <!-- .form-header-->

                            <div class="form-body">
                                <div class="mv-form-group">
                                    <div class="mv-label"><strong class="text-uppercase">email</strong></div>
                                    <div class="mv-field">
                                        <input type="email" name="email" class="mv-inputbox mv-inputbox-style-1"/>
                                    </div>
                                </div>

                                <div class="mv-form-group submit-button mv-mt-30">
                                    <button type="submit" class="mv-btn mv-btn-style-5 btn-submit">Kirim password ke
                                        email
                                    </button>
                                </div>
                            </div>
                            <!-- .form-body-->
                        </form>
                        <!-- .form-login-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- .mv-main-body-->
@endsection
