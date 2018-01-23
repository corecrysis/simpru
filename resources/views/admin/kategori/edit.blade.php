@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Kategori
            <small>Edit Kategori</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/kategori') }}">Kategori</a></li>
            <li class="active">Edit Kategori</li>
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
                        <h3 class="box-title">Edit Kategori</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" class="form-horizontal" action="/admin/kategori/update/{{$kategori->id_kategori_ruangan}}" method="post">
                        <div class="box-body">
                           
                            <div class="form-group{{ $errors->has('nm_kategori') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Nama Kategori</label>
                                <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" value="{{$kategori->nm_kategori}}" placeholder="Masukkan nama kategori" required autofocus>
                                @if ($errors->has('nm_kategori'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nm_kategori') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('singkatan_kategori') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Singkatan Kategori</label>
                                <input type="text" class="form-control" id="singkatan_kategori" name="singkatan_kategori" value="{{$kategori->singkatan_kategori}}" placeholder="Masukkan Singkatan kategori" required>
                                @if ($errors->has('singkatan_kategori'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('singkatan_kategori') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('pilih_kategori') ? ' has-error' : '' }}">
                                <label>Fakultas/Departemen/Fasilitas Umum</label>
                                <select class="form-control select2" id="pilih_kategori" name="pilih_kategori" style="width: 100%;" required>
                                    <option value="0">Pilih ...</option>
                                    <option <?php if($kategori->parent1==0){ ?> selected="selected" <?php } ?> value="fakultas">Fakultas</option>
                                    <option <?php if($kategori->parent1!=0 && $kategori->parent1!=1000){ ?> selected="selected" <?php } ?> value="departemen">Departemen</option>
                                    <option <?php if($kategori->parent1==1000){ ?> selected="selected" <?php } ?> value="sarpras">Sarana dan Prasarana</option>

                                </select>
                                @if ($errors->has('pilih_kategori'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pilih_kategori') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('select_fakultas') ? ' has-error' : '' }}" id="pilih_fakultas" <?php if($kategori->parent1==0 || $kategori->parent1==1000){    ?> style="display:none;"  <?php } ?>   >
                                <label>Pilih Fakultas</label>
                                <select class="form-control select2" id="select_fakultas" name="select_fakultas" style="width: 100%;" <?php if($kategori->parent1==0 && $kategori->parent1==1000){ ?> disabled <?php } ?>>
                                    <option selected="selected" value="0">Pilih Fakultas ...</option>
                                    @foreach ($kategori_parent as $app)
                                    <option <?php if($kategori->id_kategori_ruangan == $app->id_kategori_ruangan){ ?> selected="selected" <?php } ?> value="{{$app->id_kategori_ruangan}}">{{$app->nm_kategori}}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('select_fakultas'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('select_fakultas') }}</strong>
                                </span>
                                @endif
                            </div>
                            <input type="hidden" name="pil_fakultas" id="pil_fakultas" value="0" <?php if($kategori->parent1==0) {} else { echo 'disabled'; } ?>>
                            <input type="hidden" name="pil_fasilitas" id="pil_fasilitas" value="1000"  <?php if($kategori->parent1==1000) {} else { echo 'disabled'; } ?>>
                            
                            <?php if($kategori->parent1==0){ ?>
                            
                            <?php } ?>
                            <div class="form-group{{ $errors->has('status_kategori') ? ' has-error' : '' }}">
                                <label>Status Kategori</label>
                                <select class="form-control select2"  name="status_kategori" style="width: 100%;" required>
                                    <option <?php if($kategori->status_kategori=='0'){ ?> selected="selected" <?php } ?> value="0">Pilih Kategori</option>
                                    <option <?php if($kategori->status_kategori=='aktif'){ ?> selected="selected" <?php } ?> value="aktif">Aktif</option>
                                    <option <?php if($kategori->status_kategori=='tidak_aktif'){ ?> selected="selected" <?php } ?> value="tidak_aktif">Tidak Aktif</option>

                                </select>
                                @if ($errors->has('status_kategori'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status_kategori') }}</strong>
                                </span>
                                @endif
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
<script type="text/javascript">
    $(document).ready(function(){
//    $(function () {
        $('#pilih_kategori').change(function () {
            // console.log(halo);
            // var tglawal = $("#tglawal").val();
            // var tglakhir = $("#tglakhir").val();
            // var data =  $(this).val()+'&tgl_awal='+tglawal+'&tgl_akhir='+tglakhir;
            if($(this).val() == 'fakultas'){
                //                $('#pil-fakultas').css('display', 'block');
                $('#pil_fakultas').removeAttr('disabled');
                $('#pilih_fakultas').css('display', 'none');
                $('#select_fakultas').attr('disabled', true);
                $('#pil_fasilitas').attr('disabled', true);
            }
            else if($(this).val() == 'departemen'){
                $('#pilih_fakultas').css('display', 'block');
                $('#select_fakultas').removeAttr('disabled');
                $('#pil_fakultas').attr('disabled', true);
                $('#pil_fasilitas').attr('disabled', true);

            } else if($(this).val() == 'sarpras'){
                $('#pil_fasilitas').removeAttr('disabled');
                $('#pilih_fakultas').css('display', 'none');
                $('#select_fakultas').attr('disabled', true);
                $('#pil_fakultas').attr('disabled', true);

            }
            else {

            }

        });
    });
</script>
<!-- /.content-wrapper -->
@endsection