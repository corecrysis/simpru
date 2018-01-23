@extends('admin.layouts.app') @section('title', 'Home') @section('style')
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"> @endsection @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rekapan
            <small>View Rekap</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Rekapan</a></li>
            <li class="active">View Rekap</li>
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
                        <h3 class="box-title">Pilih tanggal dan kategori untuk melakukan rekap data</h3>


                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="/admin/rekap/detail" method="get">
                        <div class="box-body">

                            
                            <div class="form-group">
                                <label for="kategori_ruangan" class="col-sm-2 control-label">Kategori
                                    Ruangan</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="kategori_ruangan"
                                            id="kategori_ruangan"
                                            style="width: 100%;">
                                        <option selected="selected" value="">Pilih Kategori</option>
                                        @foreach($kategori as $app)
                                        <option value="{{$app->id_kategori_ruangan}}">{{$app->nm_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="tgl_retur">Waktu Mulai </label>
                                <div class=" col-md-5">
                                    <div class="input-group date" id="calendar1">
                                        <input type="text" class="form-control" name="aturan_mulai" />
                                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="tgl_retur">Waktu Berakhir </label>
                                <div class=" col-md-5">
                                    <div class="input-group date" id="calendar2">
                                        <input type="text" class="form-control" name="aturan_akhir" /> 
                                        <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
                                    </div>
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
@endsection @section('script')
<script src="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('#calendar1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            //                enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17],
        });
        $('#calendar2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',

        });
    });
</script>
@endsection