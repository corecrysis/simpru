@extends('admin.layouts.app')
@section('title', 'Home')
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <!--<h1>
Simple Tables
<small>preview of simple tables</small>
</h1>-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Rekap</a></li>
            <li class="active">Detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tabel Rekap Pengguna</h3>

<!--
                        <a href="/admin/ruang/create">
                            <button style="float: right;" class="btn btn-warning ">Tambah Pengguna</button>
</a> 'booking.id_booking', 'booking.instansi', 'booking.tujuan_pinjam', 'bw.start_date', 'bw.end_date', 'r.nm_ruangan', 'users.name', 'admins.name'
-->

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="tabel-default" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Pengguna</th>
                                    <th>Instansi</th>
                                    <th>Nama Ruangan</th>
                                    <th>Tanggal Mulai Pinjam</th>
                                    <th>Tanggal Berakhir Pinjam</th>
                                    <th>Tujuan</th>
                                    <th>Admin yang menyetujui</th>
                                    
                                </tr>

                            </thead>
                            <tbody>


                                <?php $no = 1; ?>
                                @foreach ($rekap as $app)


                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$app->nama_peminjam}}</td>
                                    <td>{{$app->instansi}}</td>
                                    <td>{{$app->nm_ruangan}}</td>
                                    <td>{{$app->start_date}}</td>
                                    <td>{{$app->end_date}}</td>
                                    <td>{{$app->tujuan_pinjam}}</td>
                                    <td>{{$app->admin_verifikasi}}</td>
                                    
                                    

                                </tr>
                                <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script>
    $(function () {
        //            console.log()
        $('#tabel-default').dataTable();
    })
</script>
@endsection