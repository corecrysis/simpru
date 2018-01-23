@extends('layouts.app')
@section('title', 'Booking')
@section('main-content')
    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/')  }}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{ url('/layanan')  }}">Layanan</a></li>
                    <li><a>Formulir Booking</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->

    <section class="mv-main-body checkout-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="checkout-block block-billing-address mv-mb-50">
                <div class="mv-form-style-2 mv-box-shadow-gray-1">
                    <div class="row">
                        <form action="{{ url('booking/storeBooking') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-sm-6 col-billing-address">
                                <div class="form-billing-address">
                                    <div class="form-header">
                                        <div class="mv-title-style-13">
                                            <div class="text-main">Identitas Diri</div>
                                        </div>
                                    </div>
                                    <!-- .form-header-->

                                    <div class="form-body">
                                        <div class="mv-form-group">
                                            <div class="mv-label"><strong class="text-uppercase">Nama Instansi <span
                                                            class="mv-color-primary">*</span></strong></div>
                                            <div class="mv-field">
                                                <input type="text" name="instansi"
                                                       palceholder="Masukkan nama instansi peminjam"
                                                       class="mv-inputbox mv-inputbox-style-2"/>
                                            </div>
                                        </div>

                                        <div class="form-header">
                                            <div class="mv-title-style-13">
                                                <div class="text-main">Keperluan</div>
                                            </div>
                                        </div>

                                        <div class="mv-form-group">
                                            <div class="mv-label"><strong class="text-uppercase">Deskripsi <span
                                                            class="mv-color-primary">*</span></strong></div>
                                            <div class="mv-field">
                                            <textarea name="tujuan_pinjam" rows="5"
                                                      placeholder="Deskripsi Tujuan Keperluan Peminjaman"
                                                      data-mv-placeholder="Deskripsi Tujuan Keperluan Peminjaman"
                                                      class="mv-inputbox mv-inputbox-style-2 mv-resize-vertical"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- .form-body-->
                                </div>
                                <!-- .form-billing-address-->
                            </div>

                            <div class="col-sm-6 col-shipping-address">
                                <div class="s">
                                    <div class="form-header">
                                        <div class="mv-title-style-13">
                                            <div class="text-main">Upload Berkas</div>
                                            <br/>
                                            <span style="color: red; font-size: 0.87em; font-style: italic;">(Apabila berkas belum ada, silakan dikosongi)</span>
                                        </div>
                                    </div>

                                    <div class="mv-form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="mv-label"><strong class="text-uppercase">Upload Surat
                                                        Peminjaman </strong><span
                                                            style="color: grey; font-size: 0.78em;">(.pdf/.jpg/.png)</span>
                                                </div>
                                                <div class="mv-field">
                                                    <input type="file" name="surat" accept="pdf/*|image/*"
                                                           class="dropdown">
                                                </div>
                                            </div>
                                            {{--<div class="col-sm-6">--}}
                                                {{--<div class="mv-label"><strong class="text-uppercase">Upload Bukti--}}
                                                        {{--Pembayaran </strong><span--}}
                                                            {{--style="color: grey; font-size: 0.78em;">(.pdf/.jpg/.png)</span>--}}
                                                {{--</div>--}}
                                                {{--<div class="mv-field">--}}
                                                    {{--<input type="file" name="berkas" accept="pdf/*|image/*"--}}
                                                           {{--class="dropdown">--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    <div class="mv-form-group submit-button mv-mt-30">
                                        <button type="submit"
                                                class="mv-btn mv-btn-style-5 btn-5-h-45 responsive-btn-5-type-1 btn-save-address">
                                            Booking
                                        </button>
                                    </div>

                                </div>
                                <!-- .form-body-->
                            </div>
                            <!-- .form-shipping-address-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-billing-address-->
        </div>
    </section>
    <!-- .mv-main-body-->
@endsection