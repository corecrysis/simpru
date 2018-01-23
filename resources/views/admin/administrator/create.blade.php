@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrator
            <small>Tambah Administrator</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/admin') }}">Administrator</a></li>
            <li class="active">Tambah Administrator</li>
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
                        <h3 class="box-title">Tambah Administrator</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="/admin/admin/insert" method="post">
                        <div class="box-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Nama Administrator</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Admin" required autofocus>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. HP" required>
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
                                <input type="number" class="form-control" id="nik_admin" name="nik_admin" placeholder="Masukkan NRP/NIK" required>
                                @if ($errors->has('nik_admin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nik_admin') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email_admin') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Email Admin</label>
                                <input type="email" class="form-control" id="email_admin" name="email_admin" placeholder="Masukkan Email" required>
                                @if ($errors->has('email_admin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email_admin') }}</strong>
                                </span>
                                @endif
                            </div>
<!--                            <input type="hidden" id="status_pengguna" name="status_pengguna" value="0">-->


                            <div class="form-group{{ $errors->has('status_admin') ? ' has-error' : '' }}">
                                <label>Status Admin</label>
                                <select class="form-control select2" name="status_admin" style="width: 100%;" required>
                                    <option selected="selected" value="">Pilih Status...</option>
                                    <option value="super_admin">Super Admin</option>
                                    <option value="admin_fakultas">Admin Fakultas</option>
                                    <option value="admin_jurusan">Admin Jurusan</option>

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