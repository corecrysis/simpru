@extends('admin.layouts.app')
@section('title', 'Home')
@section('style')
    <!---calendar---->
    <link href="{{ asset('libs/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('libs/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print"/>
    <!---end calendar---->
@endsection
@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                       <h3 class="box-title">Jadwal Ruangan di ITS</h3>
                    </div>

                    <div class="box-body table-responsive">
                        <div id="calendar-content">
                            @include('admin.ruang._jadwal_all', [
                                        'jadwal' => $event,
                                    ])
                            @yield('calendar')
                        </div>
                        <br/>
                        <div class="table-responsive">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('script')
    <!---calendar---->
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/locale-all.js') }}"></script>
    <!---end calendar---->
    <script>
        {{--$(document).ready(function () {--}}
            {{--{!! $click_tab !!}--}}
            {{--$('#calendar').fullCalendar('render');--}}
            {{--$('#calendar').fullCalendar('render');--}}
            {{--$("#calendar").fullCalendar('option', 'height', 'parent');--}}
            {{--$('#calendar').fullCalendar('option', 'contentHeight', 400);--}}
        {{--});--}}
        {{--$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {--}}
            {{--$('#calendar').fullCalendar('render');--}}
            {{--$("#calendar").fullCalendar('option', 'height', 'parent');--}}
            {{--$('#calendar').fullCalendar('option', 'contentHeight', 400);--}}
        {{--});--}}

    </script>
    @yield('script-calendar')
@endsection