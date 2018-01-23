@extends('admin.layouts.app')
@section('title', 'Detail')
@section('style')
    <!---calendar---->
    <link href="{{ asset('libs/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('libs/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print"/>
    <!---end calendar---->
@endsection
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ruangan
                <small>Detail Ruangan</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ url('admin/ruang') }}">Ruangan</a></li>
                <li class="active">Detail Ruangan</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li class=""><a href="#fasilitas" data-toggle="tab" aria-expanded="false">Fasilitas</a></li>
                            <li class=""><a href="#ketentuan" data-toggle="tab" aria-expanded="false">Ketentuan</a></li>
                            <li class=""><a href="#jadwal" id="jadwal_button" data-toggle="tab" aria-expanded="false">Jadwal</a>
                            </li>
                            <li class="active"><a href="#spec" data-toggle="tab" aria-expanded="true">Spesifikasi</a>
                            </li>
                            <li class="pull-left header">Detail Ruangan</li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="spec">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Ruangan : </label>
                                            {{$ruangan->nm_ruangan}}
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kapasitas Ruangan
                                                : </label> {{$ruangan->kapasitas}}

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Detail Ruangan
                                                : </label> {{$ruangan->detail_ruangan}}


                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Lokasi Ruangan
                                                : </label> {{$ruangan->lokasi_ruangan}}

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor HP Penanggung Jawab Ruangan
                                                : </label> {{$ruangan->no_hp_ruangan}}

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori Ruangan
                                                : </label> {{$ruangan->nm_kategori}}

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status Ruangan
                                                : </label> <?php if ($ruangan->status_ruangan == 'aktif') {
                                                echo 'Aktif';
                                            } else {
                                                echo 'Tidak Aktif';
                                            } ?>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        @if(count($foto) > 0)
                                            <div id="carousel-foto-ruangan" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    @for($i = 0; $i < count($foto); $i++)
                                                        @if($i == 0)
                                                            <li data-target="#carousel-foto-ruangan"
                                                                data-slide-to="{{ $i }}"
                                                                class="active"></li>
                                                        @else
                                                            <li data-target="#carousel-foto-ruangan"
                                                                data-slide-to="{{ $i }}"
                                                                class=""></li>
                                                        @endif
                                                    @endfor
                                                </ol>
                                                <div class="carousel-inner">
                                                    @for($i = 0; $i < count($foto); $i++)
                                                        @if($i == 0)
                                                            <div class="item active">
                                                                <img src="{{ asset('images/simpru/'.$foto[$i]['tmp_pict']) }}"
                                                                     class="img-responsive">
                                                            </div>
                                                        @else
                                                            <div class="item">
                                                                <img src="{{ asset('images/simpru/'.$foto[$i]['tmp_pict']) }}"
                                                                     class="img-responsive">
                                                            </div>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a class="left carousel-control" href="#carousel-foto-ruangan"
                                                   data-slide="prev">
                                                    <span class="fa fa-angle-left"></span>
                                                </a>
                                                <a class="right carousel-control" href="#carousel-foto-ruangan"
                                                   data-slide="next">
                                                    <span class="fa fa-angle-right"></span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if(count($aturan) > 0)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box box-default">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Aturan Jam Pakai</h3>
                                                    @if($ruangan->status_ruangan == 'non_aktif')
                                                    
                                                    @endif
                                                </div>

                                                <div class="box-body table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Hari</th>
                                                            <th>Waktu Aturan Mulai</th>
                                                            <th>Waktu Aturan Akhir</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        <?php $x = 1; ?>
                                                        @foreach ($aturan as $app)


                                                            <tr>
                                                                <td>{{$x}}</td>
                                                                <td><?php if ($app->hari_ruangan == '0') {
                                                                        echo 'Minggu';
                                                                    } else
                                                                        if ($app->hari_ruangan == '1') {
                                                                            echo 'Senin';
                                                                        } else
                                                                            if ($app->hari_ruangan == '2') {
                                                                                echo 'Selasa';
                                                                            } else
                                                                                if ($app->hari_ruangan == '3') {
                                                                                    echo 'Rabu';
                                                                                } else
                                                                                    if ($app->hari_ruangan == '4') {
                                                                                        echo 'Kamis';
                                                                                    } else
                                                                                        if ($app->hari_ruangan == '5') {
                                                                                            echo 'Jumat';
                                                                                        } else
                                                                                            if ($app->hari_ruangan == '6') {
                                                                                                echo 'Sabtu';
                                                                                            }


                                                                    ?></td>
                                                                <td>{{$app->waktu_aturan_mulai}}</td>
                                                                <td>{{$app->waktu_selesai}}</td>
                                                                <td>
                                                                    @if($ruangan->status_ruangan == 'non_aktif')

                                                                        <a href="{{ url('admin/ruang/editAturan/'.$app->id_aturan_ruangan) }}"
                                                                           class="btn btn-warning btn-flat"><i
                                                                                    class="fa fa-edit"></i> Edit</a>
                                                                        <a href="#" class="btn btn-danger btn-flat"
                                                                           onclick="document.getElementById('form-hapus-{{ $x }}').submit();"><i
                                                                                    class="fa fa-trash"></i> Hapus</a>
                                                                        <form id="form-hapus-{{ $x }}"
                                                                              action="/admin/ruang/destroyAturan/{{$app->id_aturan_ruangan}}"
                                                                              method="post">
                                                                            {{ method_field('DELETE') }}
                                                                            {{ csrf_field() }}
                                                                        </form>
                                                                    @endif
                                                                </td>
                                                            </tr>


                                                            <?php $x++; ?>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="jadwal">
                                @include('admin.ruang._jadwal_ruang', [
                                        'id' => $ruangan->id_ruangan,
                                        'jadwal' => $jadwal_json,
                                        'aturan' => $aturan_json
                                    ])
                                @yield('calendar')
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="fasilitas">
                                {!! $ruangan->fasilitas_ruangan !!}
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="ketentuan">
                                {!! $ruangan->ketentuan_ruangan !!}
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ url('admin/ruang') }}">
                        <button style="float: left;" class="btn btn-primary ">Kembali</button>
                    </a>
                    @if($ruangan->status_ruangan == 'non_aktif')
                        <form id="form-aktif"
                              action="/admin/ruang/aktif/{{$ruangan->id_ruangan}}"
                              method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                        </form>
                        <a href="{{ url('admin/ruang/edit/'.$ruangan->id_ruangan) }}">
                            <button class="btn btn-warning pull-right">Edit Ruangan</button>
                        </a>
                        <a href="#" class="btn btn-success pull-right"
                           onclick="document.getElementById('form-aktif').submit();">
                            Aktifkan</a>
                    <a href="/admin/ruang/createaturan/{{$ruangan->id_ruangan}}">
                        <button style="float: right;" class="btn btn-success ">
                            Tambah
                            Aturan
                        </button>
                    </a>
                    @else
                        <a href="#" class="btn btn-danger pull-right"
                           onclick="document.getElementById('form-non').submit();">Nonaktifkan</a>
                        <form id="form-non"
                              action="/admin/ruang/nonaktif/{{$ruangan->id_ruangan}}"
                              method="post">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <!---calendar---->
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/locale-all.js') }}"></script>
    <!---end calendar---->
    <script>
        $(document).ready(function () {
            {!! $click_tab !!}
            $('#calendar').fullCalendar('render');
            $('#calendar').fullCalendar('render');
            $("#calendar").fullCalendar('option', 'height', 'parent');
            $('#calendar').fullCalendar('option', 'contentHeight', 400);
        });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('#calendar').fullCalendar('render');
            $("#calendar").fullCalendar('option', 'height', 'parent');
            $('#calendar').fullCalendar('option', 'contentHeight', 400);
        });

    </script>
    @yield('script-calendar')
@endsection