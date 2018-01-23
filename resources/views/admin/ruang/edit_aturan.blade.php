@extends('admin.layouts.app')
@section('title', 'Home')
@section('style')
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
@endsection
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ruangan
                <small>Tambah Aturan Ruangan</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ url('admin/ruang') }}">Ruangan</a></li>
                <li class="active">Edit Aturan Ruangan</li>
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
                            <h3 class="box-title">Edit aturan</h3>

                            <a href="{{ url('admin/ruang/viewruangan/'.$aturan->id_ruangan) }}">
                                <button style="float: right;" class="btn btn-danger ">Kembali</button>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" class="form-horizontal" action="/admin/ruang/updateAturan/{{$aturan->id_aturan_ruangan}}" method="post">
                            <div class="box-body">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                
                                
                                <div class="form-group{{ $errors->has('hari_ruangan') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label" for="tgl_retur">Hari</label>
                                    <div class=" col-md-5">
                                        <div class="input-group">
                                            <select class="form-control select2" name="hari_ruangan"
                                                    style="width: 100%;">

                                                <option selected="selected" value="">Pilih Hari</option>

                                                <option value="1" {{ $aturan->hari_ruangan == 1 ? 'selected' : '' }}>Senin</option>
                                                <option value="2" {{ $aturan->hari_ruangan == 2 ? 'selected' : '' }}>Selasa</option>
                                                <option value="3" {{ $aturan->hari_ruangan == 3 ? 'selected' : '' }}>Rabu</option>
                                                <option value="4" {{ $aturan->hari_ruangan == 4 ? 'selected' : '' }}>Kamis</option>
                                                <option value="5" {{ $aturan->hari_ruangan == 5 ? 'selected' : '' }}>Jumat</option>
                                                <option value="6" {{ $aturan->hari_ruangan == 6 ? 'selected' : '' }}>Sabtu</option>
                                                <option value="0" {{ $aturan->hari_ruangan == 0 ? 'selected' : '' }}>Minggu</option>

                                            </select>
                                            @if ($errors->has('hari_ruangan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('hari_ruangan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('aturan_mulai') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label" for="tgl_retur">Waktu Mulai Aturan
                                        Ruangan</label>
                                    <div class=" col-md-5">
                                        <div class="input-group date" id="calendar1">
                                            <input type="text" class="form-control" name="aturan_mulai" value="{{ $aturan->waktu_aturan_mulai  }}"/> <span
                                                    class="input-group-addon"><span
                                                        class="glyphicon-calendar glyphicon"></span></span>
                                            @if ($errors->has('aturan_mulai'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('aturan_mulai') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('aturan_akhir') ? ' has-error' : '' }}">
                                    <label class="col-md-2 control-label" for="tgl_retur">Waktu Berakhir Aturan
                                        Ruangan</label>
                                    <div class=" col-md-5">
                                        <div class="input-group date" id="calendar2">
                                            <input type="text" class="form-control" name="aturan_akhir" value="{{ $aturan->waktu_selesai  }}"  /> <span
                                                    class="input-group-addon"><span
                                                        class="glyphicon-calendar glyphicon"></span></span>
                                            @if ($errors->has('aturan_akhir'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('aturan_akhir') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id_ruangan" value="{{$aturan->id_aturan_ruangan}}">

                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
@endsection
@section('script')
    <script src="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#calendar1').datetimepicker({
                format: 'HH:mm',
//                enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17],
            });
            $('#calendar2').datetimepicker({
                format: 'HH:mm',

            });
        });
    </script>
@endsection