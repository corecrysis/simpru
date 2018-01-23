@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kategori
            <small>Tambah Kategori</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/kategori') }}">Kategori</a></li>
            <li class="active">Tambah Kategori</li>
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
                        <h3 class="box-title">Tambah Kategori</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="/admin/kategori/insert" method="post">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('nm_kategori') ? ' has-error' : '' }}">
                                <label for="nm_kategori" class="col-sm-2 control-label">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_kategori" name="nm_kategori"
                                           placeholder="Masukkan nama kategori" value="{{ old('nm_kategori') }}" required autofocus>
                                    @if ($errors->has('nm_kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_kategori') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('singkatan_kategori') ? ' has-error' : '' }}">
                                <label for="singkatan_kategori" class="col-sm-2 control-label">Nama Singkatan Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="singkatan_kategori" name="singkatan_kategori"
                                           placeholder="Masukkan Singkatan kategori" value="{{ old('singkatan_kategori') }}" required>
                                    @if ($errors->has('singkatan_kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('singkatan_kategori') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('pilih_kategori') ? ' has-error' : '' }}">
                                <label for="kategori" class="col-sm-2 control-label">Fakultas/Departemen/Fasilitas Umum</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" id="pilih_kategori"
                                            name="pilih_kategori" style="width: 100%;" required>
                                        <option selected="selected" value="">Pilih ...</option>
                                        <option value="fakultas">Fakultas</option>
                                        <!--                                    <option value="departemen">Departemen</option>-->
                                        <option value="sarpras">Sarana dan Prasarana</option>

                                    </select>
                                    @if ($errors->has('pilih_kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pilih_kategori') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('select_fakultas') ? ' has-error' : '' }}" style="display:none;">
                                <label for="kategori" class="col-sm-2 control-label">Pilih Fakultas</label>
                                <div class="col-sm-10">
                            
                                <select class="form-control select2" id="select_fakultas" name="select_fakultas" style="width: 100%;" disabled>
                                    <option selected="selected" value="">Pilih Fakultas ...</option>
                                    @foreach ($kategori as $app)
                                    <option value="{{$app->id_kategori_ruangan}}">{{$app->nm_kategori}}</option>
                                    @endforeach

                                </select>
                                    @if ($errors->has('select_fakultas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('select_fakultas') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="pil_fakultas" id="pil-fakultas" value="0" >
                            <input type="hidden" name="pil_fasilitas" id="pil-fasilitas" value="1000" >
                            <div class="form-group{{ $errors->has('status_kategori') ? ' has-error' : '' }}">
                                <label for="kategori" class="col-sm-2 control-label">Status Kategori</label>
                                <div class="col-sm-10">
                                <select class="form-control select2" name="status_kategori" style="width: 100%;" required>
                                    <option selected="selected" value="0">Pilih Status Kategori</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak_aktif">Tidak Aktif</option>
                                                    
                                </select>
                                    @if ($errors->has('status_kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_kategori') }}</strong>
                                    </span>
                                    @endif
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
        $('#pilih_kategori').change(function () {
            // console.log(halo);
            // var tglawal = $("#tglawal").val();
            // var tglakhir = $("#tglakhir").val();
            // var data =  $(this).val()+'&tgl_awal='+tglawal+'&tgl_akhir='+tglakhir;
            if($(this).val() == 'fakultas'){
//                $('#pil-fakultas').css('display', 'block');
                $('#pil-fakultas').removeAttr('disabled');
                $('#pilih-fakultas').css('display', 'none');
                $('#select_fakultas').attr('disabled', true);
                $('#pil-fasilitas').attr('disabled', true);
            }
            else if($(this).val() == 'departemen'){
                $('#pilih-fakultas').css('display', 'block');
                $('#select_fakultas').removeAttr('disabled');
                $('#pil-fakultas').attr('disabled', true);
                $('#pil-fasilitas').attr('disabled', true);
               
            } else if($(this).val() == 'fasilitas_umum'){
                $('#pil-fasilitas').removeAttr('disabled');
                $('#pilih-fakultas').css('display', 'none');
                $('#select_fakultas').attr('disabled', true);
                $('#pil-fakultas').attr('disabled', true);

            }
            else {
               
            }

        });
    });
</script>
<!-- /.content-wrapper -->
@endsection