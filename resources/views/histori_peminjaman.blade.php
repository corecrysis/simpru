@extends('layouts.app')
@section('title', 'Dashboard')
@section('beranda-active', 'active')
@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection
@section('main-content')

    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a>Histori Peminjaman</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->

    <section class="mv-main-body cart-main  mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="cart-inner">
                <div class="cart-block block-cart-table mv-bg-white mv-box-shadow-gray-1 mv-mb-50">
                    <div class="mv-table-responsive">
                        <table id="userTable" class="table mv-table-style-2 table-bordered" style="table-layout: auto;">
                            <thead>
                                <tr>
                                    <th style="width: 6%; text-align: center">#</th>
                                    <th>Tanggal</th>
                                    <th style="width: 35%">Peminjaman</th>
                                    <th>Waktu Peminjaman</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($data as $d)
                                <tr>
                                    <td style="width: 6%; text-align: center">{{ $no }}</td>
                                    <td>
                                        {{ date('Y-m-d', strtotime($d->timestamp)) }}
                                    </td>
                                    <td style="text-align: left;width: 35%">
                                        <b>User: </b>{{$d->name}} <br/>
                                        <b>Tempat: </b>{{$d->nm_ruangan}} <br/>
                                        <b>Instansi: </b>{{$d->instansi}} <br/>
                                        <b>Tujuan: </b>{{$d->tujuan_pinjam}}
                                        <hr/>
                                        @if($d->berkas_peminjaman !== null)
                                            <a href="{{ asset('storage/booking/surat/'.$d->berkas_peminjaman) }}" target="_blank"
                                               class="mv-btn mv-btn-style-1 btn-1-h-40 responsive-btn-1-type-5">
                                                <span class="btn-inner"><i class="btn-icon fa fa-file"></i><span
                                                            class="btn-text">Lihat Berkas</span></span>
                                            </a>
                                        @else
                                            <div class="mv-label-style-1 label-hot">
                                                <div class="label-inner">Surat belum ada</div>
                                            </div> <br/>
                                            @if($d->status_verif == '0')
                                                <form class="form-contact mv-form-horizontal" method="post"
                                                      action="{{ url('pengguna/uploadSurat/'.$d->id_booking) }}"
                                                      enctype="multipart/form-data">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <div class="col-md-12">
                                                        <div class="col-sm-12">
                                                            <div class="mv-form-group">
                                                                <input type="file" name="surat"/>
                                                            </div>
                                                            <div class="mv-form-group submit-button mv-mt-20">
                                                                <div class="col-md-12 mv-field">
                                                                    <button type="submit"
                                                                            class="mv-btn mv-btn-style-22 btn-22-h-22">
                                                                        Upload
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        <strong>
                                            Tanggal Mulai: <span
                                                    class="start-date">{{  date('j M Y', strtotime($d->start_date)) }}</span></strong>
                                        <br/>
                                        Jam Mulai: <span
                                                class="start-time">{{  date('H:i', strtotime($d->start_date)) }}</span>
                                        <hr/>
                                        <strong>
                                            Tanggal Selesai: <span
                                                    class="start-date">{{  date('j M Y', strtotime($d->end_date)) }}</span></strong>
                                        <br/>
                                        Jam Selesai: <span
                                                class="start-time">{{  date('H:i', strtotime($d->end_date)) }}</span>
                                    </td>
                                    <td style="text-align:center">
                                        <div class="mv-label-style-1 label-@php if ($d->status_verif == '0') {
                                            echo 'sold-out';
                                        } else if ($d->status_verif == '1') {
                                            echo 'sale';
                                        } else {
                                            echo 'hot';
                                        } @endphp">
                                            <div class="label-inner">
                                                @php if ($d->status_verif == '0') {
                                                    echo 'Belum Diverifikasi';
                                                } else if ($d->status_verif == '1') {
                                                    echo 'Verifikasi Diterima';
                                                } else if ($d->status_verif == '3') {
                                                    echo 'Booking expired';
                                                } else {
                                                    echo 'Verifikasi Ditolak';
                                                } @endphp
                                            </div>
                                        </div>
                                        @if($d->keterangan != '')
                                            <hr/>
                                            <div>
                                                <strong>Keterangan: </strong> {{ $d->keterangan }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="mv-btn-group text-center">
                                            <div class="group-inner">
                                                {{--@if($app->status_verif=='0')--}}
                                                {{--<form role="form" id="form-delete-{{ $no }}" class="form-horizontal"--}}
                                                {{--action="/pengguna/delete/{{$app->id_booking_waktu}}/1"--}}
                                                {{--method="post">--}}
                                                {{--{{ method_field('PUT') }}--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--</form>--}}
                                                {{--<a href="#" class="btn btn-success btn-block btn-flat"--}}
                                                {{--onclick="terima('#form-terima-{{ $no }}')"><i--}}
                                                {{--class="fa fa-check"></i> Terima</a>--}}
                                                {{--@else--}}
                                                {{--<small>Telah diverifikasi oleh <b>{{ $app->admin_verif }}</b></small>--}}
                                                {{--@endif--}}
                                                @if($d->status_verif != '0' && $d->status_verif != '3')
                                                    <small>Telah diverifikasi oleh admin.</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php $no++; @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- .block-cart-table-->
            </div>

        </div>
    </section>
    <!-- .mv-main-body-->

@endsection
@section('script')
    <!-- DataTables -->
    <script src="{{ asset('/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#userTable').DataTable();
        });
    </script>
@endsection
