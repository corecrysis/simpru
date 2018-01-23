@extends('admin.layouts.app') @section('title', 'Home') @section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pengguna
            <small>Tambah Pengguna</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ url('admin/pengguna') }}">Pengguna</a></li>
            <li class="active">Tambah Pengguna</li>
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
                        <h3 class="box-title">Tambah Pengguna</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" class="form-horizontal" action="/admin/pengguna/insert" method="post">
                        <div class="box-body">
                            
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required autofocus>
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_pengguna') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="password_pengguna" name="password_pengguna" placeholder="Masukkan password" required>
                                @if ($errors->has('password_pengguna'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_pengguna') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_pengguna_konfirmasi') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_pengguna_konfirmasi" name="password_pengguna_konfirmasi" placeholder="Masukkan password" required>
                                @if ($errors->has('password_pengguna_konfirmasi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_pengguna_konfirmasi') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('nrp_pengguna') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">NRP / NIK Pengguna</label>
                                <input type="number" class="form-control" id="nrp_pengguna" name="nrp_pengguna" placeholder="Masukkan NRP/NIK" required>
                                @if ($errors->has('nrp_pengguna'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nrp_pengguna') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">No. HP</label>
                                <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. HP" required>
                                @if ($errors->has('no_hp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_hp') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email_pengguna') ? ' has-error' : '' }}">
                                <label for="exampleInputEmail1">Email Pengguna</label>
                                <input type="email" class="form-control" id="email_pengguna" name="email_pengguna" placeholder="Masukkan Email" required>
                                @if ($errors->has('email_pengguna'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email_pengguna') }}</strong>
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