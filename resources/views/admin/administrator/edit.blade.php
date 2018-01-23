@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengguna
            <small>Edit Pengguna</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/admin') }}">Admin</a></li>
            <li class="active">Edit Admin</li>
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
                        <h3 class="box-title">Edit Admin</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="/admin/admin/update/{{$administrator->id_admin}}" method="post">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Nama Admin</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$administrator->name}}" placeholder="Masukkan nama Admin" required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$administrator->no_hp}}" placeholder="Masukkan username" required>
                                @if ($errors->has('no_hp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_hp') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('pass_admin') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="pass_admin" name="pass_admin" placeholder="Masukkan password" required>
                                @if ($errors->has('pass_admin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pass_admin') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('pass_admin_konfirmasi') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="pass_admin_konfirmasi" name="pass_admin_konfirmasi" placeholder="Masukkan password" required>
                                @if ($errors->has('pass_admin_konfirmasi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pass_admin_konfirmasi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('nik_admin') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">NIK Admin</label>
                                <input type="number" class="form-control" id="nik_admin" value="{{$administrator->identifier}}" name="nik_admin" placeholder="Masukkan NIK" required>
                                @if ($errors->has('nik_admin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nik_admin') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email_admin') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Email Admin</label>
                                <input type="email" class="form-control" id="email_admin" name="email_admin" value="{{$administrator->email}}" placeholder="Masukkan Email" required>
                                @if ($errors->has('email_admin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email_admin') }}</strong>
                                </span>
                                @endif
                            </div>
                            


                            <div class="form-group{{ $errors->has('status_admin') ? ' has-error' : '' }}">
                                <label>Status Admin</label>
                                <select class="form-control select2" name="status_admin" style="width: 100%;" required>
                                    <option <?php if($administrator->status_admin=='0'){ ?> selected="selected" <?php } ?> value="0">Pilih Status...</option>
                                    <option <?php if($administrator->status_admin=='super_admin'){ ?> selected="selected" <?php } ?> value="super_admin">Super admin</option>
                                    <option <?php if($administrator->status_admin=='admin_fakultas'){ ?> selected="selected" <?php } ?> value="admin_fakultas">Admin fakultas</option>
                                    <option <?php if($administrator->status_admin=='admin_jurusan'){ ?> selected="selected" <?php } ?> value="admin_jurusan">Admin jurusan</option>

                                </select>
                                @if ($errors->has('status_admin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status_admin') }}</strong>
                                </span>
                                @endif
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
<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
<!-- /.content-wrapper -->
@endsection