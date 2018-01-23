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
                <li><a href="#">Pengguna</a></li>
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
                            <h3 class="box-title">Tabel Pengguna</h3>

                            <a href="/admin/pengguna/create">
                                <button style="float: right;" class="btn btn-warning ">Tambah Pengguna</button>
                            </a>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="tabel-default" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Pengguna</th>
                                    <th>NRP/NIK Pengguna</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Keanggotaan</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>

                                </thead>
                                <tbody>


                                <?php $no = 1; ?>
                                @foreach ($pengguna as $app)


                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$app->name}}</td>
                                        <td>{{$app->identifier}}</td>
                                        <td>{{$app->email}}</td>
                                        <td>{{$app->confirmed ? 'Aktif' : 'Belum Aktif'}}</td>
                                        <td>{{$app->keanggotaan}}</td>
                                        @if ($app->confirmed=='1')
                                            
                                        <td style="text-align: center; width: 100px;">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-info btn-responsive"
                                                   href="/admin/pengguna/edit/{{$app->id}}">
                                                    Edit Pengguna</a>
                                                <button type="button"
                                                        class="btn btn-sm btn-info btn-responsive dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <li>
                                                        <a href="#"
                                                           onclick="document.getElementById('form-non-{{ $no }}').submit();"><i
                                                                                                                                class="fa fa-eye-slash"></i>Nonaktifkan</a>
                                                        <form id="form-non-{{ $no }}"
                                                              action="/admin/pengguna/nonaktif/{{$app->id}}"
                                                              method="post">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        @elseif ($app->confirmed=='0')
                                            
                                        <td style="text-align: center; width: 100px;">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-info btn-responsive"
                                                   href="/admin/pengguna/edit/{{$app->id}}">
                                                    Edit Pengguna</a>
                                                <button type="button"
                                                        class="btn btn-sm btn-info btn-responsive dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <li>
                                                        <a href="#"
                                                           onclick="document.getElementById('form-aktif-{{ $no }}').submit();"><i
                                                                                                                                class="fa fa-eye-slash"></i>Aktifkan</a>
                                                        <form id="form-aktif-{{ $no }}"
                                                              action="/admin/pengguna/aktif/{{$app->id}}"
                                                              method="post">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                           onclick="document.getElementById('form-hapus-{{ $no }}').submit();"><i
                                                                                                                                  class="fa fa-trash"></i>Hapus </a>
                                                        <form id="form-hapus-{{ $no }}"
                                                              action="/admin/pengguna/destroy/{{$app->id}}"
                                                              method="post">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}

                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        @endif
                                        
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