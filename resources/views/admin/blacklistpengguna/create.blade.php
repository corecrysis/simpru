@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blacklist Pengguna
            <small>Tambah Blacklist</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/blacklistpengguna') }}">Blacklist Pengguna</a></li>
            <li class="active">Tambah Blacklist</li>
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
                        <h3 class="box-title">Tambah Blacklist</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="/admin/blacklistpengguna/insert" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea" id="keterangan" name="keterangan" placeholder="Masukkan keterangan blacklist ex:Nama Pengguna, Nama Organisasi, Kesalahan Pengguna Tersebut"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-2 control-label">Nama Pengguna</label>
                                <div class="col-sm-10">
                                <select class="form-control select2" name="id_pengguna" style="width: 100%;" required>
                                    <option selected="selected" value="">Pilih Pengguna</option>
                                    @foreach($blacklistpengguna as $app)
                                    <option value="{{$app->id}}">{{$app->name}}</option>
                                    @endforeach    
                                </select>
                                </div>
                            </div>
                            


                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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
<script type="text/javascript">
    $(function () {
        $('#calendar1').datetimepicker({
            language: 'en',
            useSeconds: true,
            format: 'DD-MM-YYYY hh:mm:ss',

        });
        $('#calendar2').datetimepicker({
            language: 'en',
            useSeconds: true,
            format: 'DD-MM-YYYY hh:mm:ss',

        });
    });
</script>
<!--
<script>
$(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('#detail_ruangan')
//bootstrap WYSIHTML5 - text editor
$('.textarea').wysihtml5()
})
</script>
-->
<!-- /.content-wrapper -->
@endsection