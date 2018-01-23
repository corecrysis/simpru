@extends('admin.layouts.lay_login')
@section('title', 'Login')
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-heading">Register
                     </div>
                

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.register.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <p class="help-block">(Masukkan alamat email yang aktif dan sering dibuka oleh anda)</p>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('identifier') ? ' has-error' : '' }}">
                            <label for="identifier" class="col-md-4 control-label">NIP</label>

                            <div class="col-md-6">
                                <input id="identifier" type="text" class="form-control" name="identifier" value="{{ old('identifier') }}" required autofocus>

                                @if ($errors->has('identifier'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('identifier') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                            <label for="kategori" class="col-md-4 control-label">Tipe Admin</label>

                            <div class="col-md-6">
                                <select id="kategori" name="kategori" class="form-control">
                                    <option value="">Pilih Jurusan/Fakultas/Sarpras</option>
                                    <option value="0">Admin Sarana dan Prasarana</option>
                                    @foreach($kategori as $kat)
                                        <option value="{{ $kat->id_kategori_ruangan }}">Admin {{ $kat->nm_kategori }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('kategori'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('kategori') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                            <label for="no_hp" class="col-md-4 control-label">No. HP</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required autofocus>

                                @if ($errors->has('no_hp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_hp') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button >
                                <a href="{{ route('admin.login') }}" class="btn btn-primary" >
                                    Login
                                </a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
