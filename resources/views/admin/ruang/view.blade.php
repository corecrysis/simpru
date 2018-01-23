@extends('admin.layouts.app')
@section('title', 'Home')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Ruangan</a></li>
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
                            <h3 class="box-title">Tabel Ruangan</h3>

                            <a href="/admin/ruang/create">
                                <button style="float: right;" class="btn btn-warning ">Tambah Ruangan</button>
                            </a>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="tabel-default" class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>Kapasitas</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th style="text-align: center; width: 14em">Aksi</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                @foreach ($ruangan as $app)


                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$app->nm_ruangan}}</td>
                                        <td>{{$app->kapasitas}}</td>
                                        <td>{{$app->lokasi_ruangan}}</td>
                                        <td><span class="label {{ $app->status_ruangan=='aktif' ? 'bg-green' : 'bg-red' }}">{{$app->status_ruangan}}</span></td>
                                        <td style="text-align: center">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-info btn-responsive"
                                                   href="/admin/ruang/viewruangan/{{$app->id_ruangan}}">
                                                    Detail</a>
                                                <button type="button" class="btn btn-sm btn-info btn-responsive dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    @if ($app->status_ruangan=='aktif')
                                                        <li>
                                                            <a href="#"
                                                               onclick="document.getElementById('form-non-{{ $no }}').submit();"><i
                                                                        class="fa fa-eye-slash"></i>Nonaktifkan</a>
                                                            <form id="form-non-{{ $no }}"
                                                                  action="/admin/ruang/nonaktif/{{$app->id_ruangan}}"
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
                                                                  action="/admin/ruang/aktif/{{$app->id_ruangan}}"
                                                                  method="post">
                                                                {{ method_field('PUT') }}
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                        <li><a
                                                               href="/admin/ruang/createaturan/{{$app->id_ruangan}}"><i
                                                                        class="fa fa-clock-o"></i>
                                                                Tambah Aturan</a>
                                                        </li>
                                                        <li><a
                                                               href="/admin/ruang/edit/{{$app->id_ruangan}}"><i
                                                                        class="fa fa-edit"></i>
                                                                Edit</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="javascript:void(0);" class="btn-hapus" data-target="#form-hapus-{{$no}}"><i
                                                                        class="fa fa-trash"></i>Hapus Ruangan</a>
                                                            <form id="form-hapus-{{ $no }}"
                                                                  action="/admin/ruang/destroy/{{$app->id_ruangan}}"
                                                                  method="post">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
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
        });

        $('.btn-hapus').click(function () {
                //console.log('tolak');
                var form = $(this).data('target');
                var a = confirm('Apakah anda yakin akan menghapus ruangan ini? penghapusan yang dilakukan tidak dapat dikembalikan');
                if (a) {
                    $(form).submit();
                }
            });
    </script>
@endsection