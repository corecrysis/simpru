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
                <li><a href="#">Kategori</a></li>
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
                            <h3 class="box-title">Tabel Kategori</h3>

                            <a href="/admin/kategori/create">
                                <button style="float: center;" class="btn btn-warning ">Tambah Kategori Fakultas/Sarpras</button>
                            </a>
                            
                            <a href="/admin/kategori/createdept">
                                <button style="float: center;" class="btn btn-success ">Tambah Kategori Departemen</button>
                            </a>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="tabel-default" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 40%">Nama Kategori</th>
                                    <th style="width: 40%">Status</th>
                                    <th>Aksi</th>
                                </tr>

                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                @foreach ($kategori as $app)


                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$app->nm_kategori}}</td>
                                        <td>{{$app->status_kategori}}</td>
                                        @if ($app->status_kategori=='aktif')
                                            <td>
                                                <table>
                                                    <td>
                                                        <form role="form" class="form-horizontal"
                                                              action="/admin/kategori/nonaktif/{{$app->id_kategori_ruangan}}"
                                                              method="post">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                            <button class="btn btn-primary btn-flat">Nonaktifkan
                                                            </button>
                                                        </form>
                                                    </td>
                                                </table>
                                            </td>
                                        @else
                                            <td>
                                                <table>
                                                    <td>
                                                        <a href="/admin/kategori/edit/{{$app->id_kategori_ruangan}}">
                                                            <button class="btn btn-primary btn-flat">Edit
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form role="form" class="form-horizontal"
                                                              action="/admin/kategori/destroy/{{$app->id_kategori_ruangan}}"
                                                              method="post">
                                                            {{ method_field('DELETE') }}
                                                            {{ csrf_field() }}
                                                            <button class="btn btn-danger btn-flat">Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form role="form" class="form-horizontal"
                                                              action="/admin/kategori/aktif/{{$app->id_kategori_ruangan}}"
                                                              method="post">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                            <button class="btn btn-success btn-flat">Aktifkan
                                                            </button>
                                                        </form>
                                                    </td>
                                                </table>
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