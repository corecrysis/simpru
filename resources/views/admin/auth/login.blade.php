@extends('admin.layouts.lay_login')
@section('title', 'Login')
@section('main-content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/admin') }}"><b>Admin</b> SIMPRU</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Masuk sebagai admin</p>

            <form action="{{ url('admin/login') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="checkbox" {{ old('remember') ? 'checked' : '' }}  name="remember"> Remember Me
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary  btn-flat">Sign In</button>
                        <a href="{{ route('admin.register') }}" class="btn btn-primary">
                            Register
                        </a>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->

            {{--<a href="#">I forgot my password</a><br>--}}
            {{--<a href="register.html" class="text-center">Register a new membership</a>--}}

        </div>
        <!-- /.login-box-body -->
    </div>

@endsection
@section('script')
    {{--<script type="text/javascript" src="{{ asset('admin-lte/plugins/iCheck/icheck.min.js')}}"></script>--}}
    {{--<script>--}}
    {{--$(function () {--}}
    {{--$('input').iCheck({--}}
    {{--checkboxClass: 'icheckbox_square-blue',--}}
    {{--radioClass: 'iradio_square-blue',--}}
    {{--increaseArea: '60%' // optional--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endsection