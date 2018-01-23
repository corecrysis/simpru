@extends('layouts.app')
@section('title', 'Login')
@section('login-active', 'active')
@section('main-content')
    <div class="clearfix">
        <section class="main-breadcrumb mv-wrap">
            <div class="mv-breadcrumb-style-1">
                <div class="container mv-mt-50">
                    <ul class="breadcrumb-1-list">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                        <li><a>Masuk</a></li>
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
                            <form method="POST" class="form-login" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-header mv-mb-0">
                                    <div class="mv-title-style-13">
                                        <div class="text-main">Masuk</div>
                                    </div>
                                    <hr>
                                </div>
                                <!-- .form-header-->

                                <div class="form-body">
                                    @if (session('confirmation-success'))
                                        <div class="alert alert-success">
                                            {{ session('confirmation-success') }}
                                        </div>
                                    @endif
                                    @if (session('confirmation-danger'))
                                        <div class="alert alert-danger">
                                            {!! session('confirmation-danger') !!}
                                        </div>
                                    @endif
                                    <div class="mv-form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="mv-label"><strong class="text-uppercase">Email</strong></div>
                                        <div class="mv-field">
                                            <input type="email" name="email" class="mv-inputbox mv-inputbox-style-1"
                                                   value="{{ old('email') }}"
                                                   required/>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mv-form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="mv-label"><strong class="text-uppercase">Kata Sandi</strong></div>
                                        <div class="mv-field">
                                            <input type="password" name="password"
                                                   class="mv-inputbox mv-inputbox-style-1" required/>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mv-form-group submit-button mv-mb-0"
                                         style="display: inline-block;vertical-align: baseline;">
                                        <label class="mv-checkbox mv-checkbox-style-1 checkbox-remember">
                                            <input type="checkbox" name="remember" class="hidden"/><span
                                                    class="checkbox-after-input" {{ old('remember') ? 'checked' : '' }}><span class="checkbox-visual-box"><span
                                                            class="icon-checked fa fa-check"></span></span><span
                                                        class="checkbox-text">Ingat saya</span></span>
                                        </label>
                                    </div>
                                    <div class="mv-form-group submit-button mv-mb-0"
                                         style="display: inline-block;vertical-align: baseline;float:right;">
                                        <div class="mv-form-group"><a href="{{ route('password.request') }}"
                                                                      class="btn-forgot-pass">Lupa password?</a></div>
                                    </div>
                                    <div class="mv-mb-20">
                                        <button type="submit" class="mv-btn mv-btn-block mv-btn-style-5 btn-login">
                                            Masuk
                                        </button>
                                    </div>
                                    <div class="mv-form-group submit-button mv-mb-0">
                                        <div class="mv-form-group">Belum punya akun? <a href="{{ route('integra.login') }}"
                                                                                        class="btn-forgot-pass">Daftar
                                                Warga Internal ITS</a> / <a href="{{ route('register') }}"
                                                                            class="btn-forgot-pass">Daftar
                                                Pihak Eksternal</a></div>
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
