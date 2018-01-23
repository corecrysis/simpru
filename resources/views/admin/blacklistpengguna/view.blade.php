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
                <li><a href="#">Blacklist Pengguna</a></li>
                <li class="active">View</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tabel Blacklist Pengguna</h3>

                            <a href="/admin/blacklistpengguna/create">
                                <button style="float: right;" class="btn btn-warning ">Tambah Blacklist Pengguna
                                </button>
                            </a>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="tabel-default" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Keterangan</th>
                                    <th>Nama Pengguna</th>
                                    <th>Penanggung Jawab</th>

                                    <th style="width: 40px">Aksi</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                @foreach ($blacklistpengguna as $app)


                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$app->nm_blacklist}}</td>
                                        <td>{{$app->nm_pengguna}}</td>
                                        <td>{{$app->nm_admin}}</td>


                                        <td>
                                            <table>

                                                <td>
                                                    <a class="btn btn-primary btn-flat"
                                                       href="/admin/blacklistpengguna/edit/{{$app->id_blacklist}}">
                                                        Edit</a>
                                                </td>
                                                <td>
                                                    <form role="form" class="form-horizontal"
                                                          action="/admin/blacklistpengguna/destroy/{{$app->id_blacklist}}"
                                                          method="post">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger btn-flat">Hapus</button>
                                                    </form>
                                                </td>

                                            </table>
                                        </td>


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