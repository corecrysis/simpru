@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blacklist Pengguna
            <small>Edit Blacklist</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/blacklistpengguna') }}">Blacklist Pengguna</a></li>
            <li class="active">Edit Blacklist</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Blacklist</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" class="form-horizontal" action="/admin/blacklistpengguna/update/{{$blacklistpengguna->id_blacklist}}" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea class="textarea" id="keterangan" name="keterangan" placeholder="Masukkan keterangan blacklist ex:Nama Pengguna, Nama Organisasi, Kesalahan Pengguna Tersebut"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$blacklistpengguna->nm_blacklist}}</textarea>

                            </div>
                            
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <select class="form-control select2" name="id_kategori_ruangan" style="width: 100%;">
                                    <option selected="selected" value="0">Pilih Pengguna</option>
                                    @foreach($pengguna as $app)
                                    <option <?php if($blacklistpengguna->id_pengguna==$app->id_pengguna){ ?> selected="selected" <?php } ?> value="{{$app->id_pengguna}}">{{$app->nm_pengguna}}</option>
                                    @endforeach    
                                </select>
                            </div>
                            


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                    </form>
                </div>
                <!-- /.box -->

                <!-- Form Element sizes -->

                <!-- /.box -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->
@endsection