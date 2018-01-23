@extends('layouts.app')
@section('title', 'Register')
@section('main-content')
    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a>Daftar</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->

    <section class="mv-main-body login-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-centered col-register">
                    <div class="mv-form-style-1 mv-box-shadow-gray-1">
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                        <form method="POST" class="form-register" action="{{ route('integra.register.submit') }}">
                            {{ csrf_field() }}
                            <div class="form-header">
                                <div class="mv-title-style-13">
                                    <div class="text-main">Buat Akun</div>
                                </div>
                            </div>
                            <!-- .form-header-->

                            <div class="form-body">
                                <div class="mv-form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="mv-label"><strong class="text-uppercase">Nama<span
                                                    class="mv-color-primary"> *</span></strong></div>
                                    <div class="mv-field">
                                        <input type="nama" name="name"
                                               value="{{ property_exists($data, 'nama_lengkap') ? $data->nama_lengkap : "" }}"
                                               class="mv-inputbox mv-inputbox-style-1"
                                               required/>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mv-form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="mv-label"><strong class="text-uppercase">Email <span
                                                    class="mv-color-primary"> *</span></strong>
                                        <small style="color: red;">(untuk login SIMPRU)</small>
                                    </div>
                                    <div class="mv-field">
                                        <input type="email" name="email"
                                               value="{{ property_exists($data, 'email') ? $data->email : "" }}"
                                               class="mv-inputbox mv-inputbox-style-1"
                                               required/>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mv-form-group{{ $errors->has('identifier') ? ' has-error' : '' }}">
                                    <div class="mv-label"><strong class="text-uppercase">NRP/NIP/NIK<span
                                                    class="mv-color-primary"> *</span></strong></div>
                                    <div class="mv-field">
                                        <input type="nama" name="identifier"
                                               value="{{ property_exists($data, 'identifier') ? $data->identifier : "" }}"
                                               class="mv-inputbox mv-inputbox-style-1"
                                               required/>
                                        @if ($errors->has('identifier'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('identifier') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{--<div class="mv-form-group{{ $errors->has('tipe') ? ' has-error' : '' }}">--}}
                                {{--<div class="mv-label"><strong class="text-uppercase">Jenis Pengguna<span--}}
                                {{--class="mv-color-primary"> *</span></strong></div>--}}
                                {{--<div class="mv-field">--}}
                                {{--<label class="mv-select mv-select-style-1 h-40">--}}
                                {{--<select name="tipe">--}}
                                {{--<option {{ old('tipe')=='internal' ? 'selected' : '' }} value="internal">Pengguna Internal</option>--}}
                                {{--<option {{ old('tipe')=='eksternal' ? 'selected' : '' }} value="eksternal">Pengguna Eksternal</option>--}}
                                {{--</select>--}}
                                {{--</label>--}}

                                {{--@if ($errors->has('tipe'))--}}
                                {{--<span class="help-block">--}}
                                {{--<strong>{{ $errors->first('tipe') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                <div class="mv-form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                    <div class="mv-label"><strong class="text-uppercase">No. HP<span
                                                    class="mv-color-primary"> *</span></strong></div>
                                    <div class="mv-field">
                                        <input type="text" name="no_hp"
                                               value="{{ property_exists($data, 'no_telp') ? $data->no_telp : "" }}"
                                               class="mv-inputbox mv-inputbox-style-1"
                                               required/>
                                        @if ($errors->has('no_hp'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('no_hp') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mv-form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="mv-label"><strong class="text-uppercase">Kata Sandi</strong>
                                        <small style="color: red;">(untuk login SIMPRU)</small>
                                    </div>
                                    <div class="mv-field">
                                        <input type="password" name="password" class="mv-inputbox mv-inputbox-style-1"
                                               required/>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mv-form-group">
                                    <div class="mv-label"><strong class="text-uppercase">Ketik Ulang Kata Sandi</strong>
                                    </div>
                                    <div class="mv-field">
                                        <input id="password-confirm" type="password" name="password_confirmation"
                                               class="mv-inputbox mv-inputbox-style-1"
                                               required/>
                                    </div>
                                </div>

                                <div class="mv-form-group submit-button mv-mt-30">
                                    <button type="submit" class="mv-btn mv-btn-block mv-btn-style-5 btn-signup">
                                        Daftarkan saya
                                    </button>
                                </div>
                            </div>
                            <!-- .form-body-->
                        </form>
                        <!-- .form-register-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- .mv-main-body-->
@endsection
