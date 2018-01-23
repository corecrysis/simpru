@extends('layouts.app')
@section('title', 'Login')
@section('login-active', 'active')
@section('main-content')
    <div class="clearfix">
        <section class="main-breadcrumb mv-wrap">
            <div class="mv-breadcrumb-style-1">
                <div class="container mv-mt-50">
                    <ul class="breadcrumb-1-list">
                        <li><a href="{!! url('/') !!}"><i class="fa fa-home"></i></a></li>
                        <li><a>Verifikasi Integra</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- .main-breadcrumb-->

        <section class="mv-main-body login-main mv-bg-pattern-subtle mv-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-centered col-login">
                        <div class="mv-form-style-1 mv-box-shadow-gray-1">
                            <form method="POST" class="form-login" action="{!! route('integra.login.submit') !!}">
                                {!! csrf_field() !!}
                                <div class="form-header mv-mb-0">
                                    <div class="mv-title-style-13">
                                        <div class="text-main">Verifikasi Integra</div><br/>
                                        <small style="color: red;">Sebelum melakukan pendaftaran, akan dilakukan verifikasi dengan akun integra terlebih dahulu. Masukkan username dan password Integra pada form dibawah ini.</small>
                                    </div>
                                    <hr>
                                </div>
                                <!-- .form-header-->

                                <div class="form-body">
                                    @if (session('confirmation-success'))
                                        <div class="alert alert-success">
                                            {!! session('confirmation-success') !!}
                                        </div>
                                    @endif
                                    @if (session('confirmation-danger'))
                                        <div class="alert alert-danger">
                                            {!! session('confirmation-danger') !!}
                                        </div>
                                    @endif
                                        <div class="mv-form-group{!! $errors->has('tipe') ? ' has-error' : '' !!}">
                                            <div class="mv-label"><strong class="text-uppercase">Jenis Pengguna<span
                                                            class="mv-color-primary"> *</span></strong></div>
                                            <div class="mv-field">
                                                <label class="mv-select mv-select-style-1 h-40">
                                                    <select name="tipe">
                                                        <option {!! old('tipe')=='1' ? 'selected' : '' !!} value="1">
                                                            Mahasiswa
                                                        </option>
                                                        <option {!! old('tipe')=='2' ? 'selected' : '' !!} value="2">
                                                            Dosen
                                                        </option>
                                                        <option {!! old('tipe')=='3' ? 'selected' : '' !!} value="3">
                                                            Tendik
                                                        </option>
                                                    </select>
                                                </label>

                                                @if ($errors->has('tipe'))
                                                    <span class="help-block">
                                                    <strong>{!! $errors->first('tipe') !!}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mv-form-group {!! $errors->has('identifier') ? ' has-error' : '' !!}">
                                            <div class="mv-label"><strong class="text-uppercase">NRP/NIP/NIK</strong>
                                            </div>
                                            <div class="mv-field">
                                                <input type="text" name="identifier" class="mv-inputbox mv-inputbox-style-1"
                                                       placeholder="Masukkan NIP/NRP anda"
                                                       value="{!! old('identifier') !!}"
                                                       required/>
                                                @if ($errors->has('identifier'))
                                                    <span class="help-block">
                                                        <strong>{!! $errors->first('identifier') !!}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mv-form-group {!! $errors->has('email') ? ' has-error' : '' !!}">
                                            <div class="mv-label"><strong class="text-uppercase">Username Intgera </strong><small style="color: red">(username yang biasa digunakan untuk login kedalam Integra)</small>
                                            </div>
                                            <div class="mv-field">
                                                <input type="text" name="email" class="mv-inputbox mv-inputbox-style-1"
                                                       placeholder="Masukkan Username Integra anda"
                                                       value="{!! old('email') !!}"
                                                       required/>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{!! $errors->first('email') !!}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mv-form-group{!! $errors->has('password') ? ' has-error' : '' !!}">
                                            <div class="mv-label"><strong class="text-uppercase">Kata Sandi</strong>
                                            </div>
                                            <div class="mv-field">
                                                <input type="password" name="password"
                                                       placeholder="Masukkan password integra anda"
                                                       class="mv-inputbox mv-inputbox-style-1" required/>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{!! $errors->first('password') !!}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mv-mb-20">
                                            <button type="submit" class="mv-btn mv-btn-block mv-btn-style-5 btn-login">
                                                Masuk
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
    </div>
@endsection
