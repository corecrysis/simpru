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
                <li><a href="#">Adminstrator</a></li>
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
                            <h3 class="box-title">Tabel Administrator</h3>

                            <a href="/admin/admin/create">
                                <button style="float: right;" class="btn btn-warning ">Tambah Administrator</button>
                            </a>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="tabel-default" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Admin</th>
                                    <th>Status</th>
                                    <th style="width: 100px">Aksi</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                @foreach ($administrator as $app)


                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>
                                            <b>Nama: </b>{{$app->name}}<br/>
                                            <b>NIP: </b>{{$app->identifier}}<br/>
                                            <b>Email: </b>{{$app->email}}<br/>
                                            <b>Status: </b>{{$app->status_admin}}<br/>
                                            <b>HP: </b>{{$app->no_hp}}
                                        </td>
                                        <td>
                                            <span class="label {{ $app->status==1 ? 'bg-green' : 'bg-red' }}">{{ $app->status=='0' ? 'Belum Aktif' : 'Aktif' }}</span>
                                        </td>
                                        @if ($app->status_admin != 'super_admin')
                                            <td style="text-align: center; width: 100px;">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-info btn-responsive"
                                                       href="/admin/admin/edit/{{$app->id}}">
                                                        Edit Admin</a>
                                                    <button type="button"
                                                            class="btn btn-sm btn-info btn-responsive dropdown-toggle"
                                                            data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                        @if ($app->status==1)
                                                            <li>
                                                                <a href="#"
                                                                   onclick="document.getElementById('form-non-{{ $no }}').submit();"><i
                                                                            class="fa fa-eye-slash"></i>Nonaktifkan</a>
                                                                <form id="form-non-{{ $no }}"
                                                                      action="/admin/admin/nonaktif/{{$app->id}}"
                                                                      method="post">
                                                                    {{ method_field('PUT') }}
                                                                    {{ csrf_field() }}
                                                                </form>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <a href="#"
                                                                   onclick="document.getElementById('form-aktif-{{ $no }}').submit();"><i
                                                                            class="fa fa-check-circle-o"></i>
                                                                    Aktifkan</a>
                                                                <form id="form-aktif-{{ $no }}"
                                                                      action="/admin/admin/aktif/{{$app->id}}"
                                                                      method="post">
                                                                    {{ method_field('PUT') }}
                                                                    {{ csrf_field() }}
                                                                </form>
                                                            </li>


                                                            <li class="divider"></li>
                                                            <li>
                                                                <a href="#"
                                                                   onclick="document.getElementById('form-hapus-{{ $no }}').submit();"><i
                                                                            class="fa fa-trash"></i>Hapus Admin</a>
                                                                <form id="form-hapus-{{ $no }}"
                                                                      action="/admin/admin/destroy/{{$app->id}}"
                                                                      method="post">
                                                                    {{ method_field('DELETE') }}
                                                                    {{ csrf_field() }}

                                                                </form>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>


                                        @else
                                            <td>
                                                Ini super admin!
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