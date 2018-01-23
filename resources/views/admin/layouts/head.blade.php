<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SIMPRU ADMIN | @yield('title') </title>
<meta name="description" content="Sistem Informasi Peminjaman Ruang ITS">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon-->
<link rel="shortcut icon" href="{{ asset('images/icon/icon_simpru.ico') }}" type="image/x-icon">
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/jQueryUI/jquery-ui.min.css') }}">
{{--<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">--}}
{{--<link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.datetimepicker.css') }}">--}}
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/font-awesome/css/font-awesome.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/Ionicons/css/ionicons.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/skins/_all-skins.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/iCheck/flat/blue.css') }}">
<!-- Morris chart -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/morris/morris.css') }}">
<!-- jvectormap -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
<!-- Date Picker -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/datepicker/datepicker3.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">

<!-- text editor -->
<link rel="stylesheet" href="{{ asset('/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
{{--qtip--}}
<link href="{{ asset('libs/jquery-qtip/jquery.qtip.min.css') }}" rel="stylesheet"/>
<script type="text/javascript" src="{{ asset('libs/jquery/jquery-2.1.4.min.js') }}"></script>
<style>
    @media (max-width: 768px) {
        .btn-responsive {
            padding:2px 4px;
            font-size:80%;
            line-height: 1;
            border-radius:3px;
        }
    }

    @media (min-width: 769px) and (max-width: 992px) {
        .btn-responsive {
            padding:4px 9px;
            font-size:90%;
            line-height: 1.2;
        }
    }

</style>
@yield('style')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->