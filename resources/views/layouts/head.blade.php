<meta charset="UTF-8">
<title>SIMPRU | @yield('title') </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Sistem Informasi Peminjaman Ruang ITS">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Favicon-->
<link rel="shortcut icon" href="{{ asset('images/icon/icon_simpru.ico') }}" type="image/x-icon">

<!-- Web Fonts-->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Varela+Round">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">

<!-- Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.datetimepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/jquery-ui/jquery-ui.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/superfish-menu/css/superfish.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/slick-sider/slick.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/slick-sider/slick-theme.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/swiper-sider/dist/css/swiper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('libs/magnific-popup/dist/magnific-popup.min.css') }}">

<!---calendar---->
<link href="{{ asset('libs/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet"/>
<link href="{{ asset('libs/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print"/>
<!---end calendar---->
{{--qtip--}}
<link href="{{ asset('libs/jquery-qtip/jquery.qtip.min.css') }}" rel="stylesheet"/>


<!-- Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/shortcodes.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/style-selector.css') }}">
<link id="style-main-color" rel="stylesheet" type="text/css" href="{{ asset('css/color/color3.css') }}">

<script type="application/x-javascript">
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<style>
    .fc-nonbusiness {
        background: #f30707;
    }
    a.fc-day-number {
        color: #000;
    }
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
<!-- WARNING: Respond.js doesn't work if you view the page via file://-->
<!--if lt IE 9
script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')

-->
{{--page style--}}
@yield('style')