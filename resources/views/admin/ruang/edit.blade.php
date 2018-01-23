@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ruangan
            <small>Edit Ruangan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/ruang') }}">Ruangan</a></li>
            <li class="active">Edit Ruangan</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Ruangan</h3>

                        <a href="{{ url('admin/ruang') }}">
                            <button style="float: right;" class="btn btn-danger ">Kembali</button>
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="/admin/ruang/update/{{$ruangan->id_ruangan}}" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('nm_ruangan') ? ' has-error' : '' }}">
                                <label for="nm_ruangan" class="col-sm-2 control-label">Nama Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nm_ruangan" name="nm_ruangan"
                                           value="{{$ruangan->nm_ruangan}}" placeholder="Masukkan nama ruangan" required>
                                    @if ($errors->has('nm_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nm_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group{{ $errors->has('kapasitas') ? ' has-error' : '' }}">
                                <label for="kapasitas" class="col-sm-2 control-label">Kapasitas Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                           value="{{$ruangan->kapasitas}}" placeholder="Masukkan kapasitas ruangan" required>
                                    @if ($errors->has('kapasitas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kapasitas') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('detail_ruangan') ? ' has-error' : '' }}">
                                <label for="detail_ruangan" class="col-sm-2 control-label">Detail Ruangan</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea" id="detail_ruangan" name="detail_ruangan"
                                              placeholder="Masukkan Detail ruangan"
                                              style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{$ruangan->detail_ruangan}}</textarea>
                                    @if ($errors->has('detail_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detail_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('fasilitas_ruangan') ? ' has-error' : '' }}">
                                <label for="fasilitas_ruangan" class="col-sm-2 control-label">Fasilitas
                                    Ruangan</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea" id="fasilitas_ruangan" name="fasilitas_ruangan"
                                              placeholder="Masukkan Fasilitas ruangan"
                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{$ruangan->fasilitas_ruangan}}</textarea>
                                    @if ($errors->has('fasilitas_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fasilitas_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('ketentuan_ruangan') ? ' has-error' : '' }}">
                                <label for="ketentuan_ruangan" class="col-sm-2 control-label">Ketentuan
                                    Ruangan</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea" id="ketentuan_ruangan" name="ketentuan_ruangan"
                                              placeholder="Masukkan Ketentuan ruangan"
                                              style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required>{{$ruangan->ketentuan_ruangan}}</textarea>
                                    @if ($errors->has('ketentuan_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ketentuan_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('lokasi_ruangan') ? ' has-error' : '' }}">
                                <label for="lokasi_ruangan" class="col-sm-2 control-label">Lokasi Ruangan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lokasi_ruangan"
                                           name="lokasi_ruangan" value="{{$ruangan->lokasi_ruangan}}"
                                           placeholder="Masukkan Lokasi ruangan" required>
                                    @if ($errors->has('lokasi_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lokasi_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('no_hp_ruangan') ? ' has-error' : '' }}">
                                <label for="no_hp_ruangan" class="col-sm-2 control-label">Nomor HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no_hp_ruangan"
                                           name="no_hp_ruangan" value="{{$ruangan->no_hp_ruangan}}"
                                           placeholder="Masukkan Nomor HP" required>
                                    @if ($errors->has('no_hp_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('id_kategori_ruangan') ? ' has-error' : '' }}">
                                <label for="kategori_ruangan" class="col-sm-2 control-label">Kategori
                                    Ruangan</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="id_kategori_ruangan" style="width: 100%;" required>
                                        <option selected="selected" value="0">Pilih Kategori</option>
                                        @foreach($kategori as $app)
                                            <option <?php if($ruangan->id_kategori_ruangan==$app->id_kategori_ruangan){ ?> selected="selected" <?php } ?> value="{{$app->id_kategori_ruangan}}">{{$app->nm_kategori}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_kategori_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_kategori_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('status_ruangan') ? ' has-error' : '' }}">
                                <label for="status_ruangan" class="col-sm-2 control-label">Status
                                    Ruangan</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="status_ruangan" style="width: 100%;" required>
                                        <option <?php if($ruangan->status_ruangan=='0'){ ?> selected="selected" <?php } ?> value="0">Pilih Status</option>
                                        <option <?php if($ruangan->status_ruangan=='aktif'){ ?> selected="selected" <?php } ?> value="aktif">Aktif</option>
                                        <option <?php if($ruangan->status_ruangan=='non_aktif'){ ?> selected="selected" <?php } ?> value="non_aktif">Tidak Aktif</option>

                                    </select>
                                    @if ($errors->has('status_ruangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_ruangan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <img src="{{ isset($fruangan[0]) ? '/images/simpru/'.$fruangan[0]->tmp_pict : '#' }}"  width="42" height="42">
                                <label for="foto_1" class="col-sm-2 control-label">Upload Foto 1
                                </label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto_1" id="foto_1" accept="image/*"
                                           class="dropdown">
                                    <p class="help-block">(image(.jpg/.jpeg.png) Max 2MB)</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <img src="{{ isset($fruangan[1]) ? '/images/simpru/'.$fruangan[1]->tmp_pict : '#' }}"  width="42" height="42">
                                <label for="foto_2" class="col-sm-2 control-label">Upload Foto 2
                                </label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto_2" id="foto_2" accept="image/*"
                                           class="dropdown">
                                    <p class="help-block">(image(.jpg/.jpeg.png) Max 2MB)</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <img src="{{ isset($fruangan[2]) ? '/images/simpru/'.$fruangan[2]->tmp_pict : '' }}"  width="42" height="42">
                                <label for="foto_3" class="col-sm-2 control-label">Upload Foto 3
                                </label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto_3" id="foto_3" accept="image/*"
                                           class="dropdown">
                                    <p class="help-block">(image(.jpg/.jpeg.png) Max 2MB)</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <img src="{{ isset($fruangan[3]) ? '/images/simpru/'.$fruangan[3]->tmp_pict : '' }}"  width="42" height="42">
                                <label for="foto_4" class="col-sm-2 control-label">Upload Foto 4
                                </label>
                                <div class="col-sm-10">
                                    <input type="file" name="foto_4" id="foto_4" accept="image/*"
                                           class="dropdown">
                                    <p class="help-block">(image(.jpg/.jpeg.png) Max 2MB)</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
</div>

<!-- /.content-wrapper -->
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('ketentuan_ruangan');
            CKEDITOR.replace('fasilitas_ruangan');
            CKEDITOR.replace('detail_ruangan');
        });
    </script>
@endsection