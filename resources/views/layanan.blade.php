@extends('layouts.app')
@section('title', 'Layanan')
@section('layanan-active', 'active')
@section('main-content')
    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a href="#">Layanan</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->
    <section class="mv-main-body search-main blog-grid-2-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="row mv-content-sidebar">
                <div class="mv-c-s-content col-xs-12 col-md-8 col-lg-9">
                    <div class="row search-sort">
                        <div class="col-xs-6 col-item hidden-sm hidden-xs">
                            <div class="sort-result mv-f-16">{{ $data->total() }} hasil ditemukan.</div>
                        </div>
                    </div>
                    <div class="row search-sort">
                        <div class="col-xs-12 col-item hidden-lg hidden-md">
                            <form method="GET" class="form-aside-search" action="{{ url('layanan/searchQuery') }}">
                                <div class="mv-inputbox-icon right">
                                    <input type="text" name="q_cari" class="mv-inputbox mv-inputbox-style-1"
                                           placeholder="Cari ruangan/lokasi/kapasitas"/>
                                    <button type="submit" class="icon mv-btn mv-btn-style-4 fa fa-search"></button>
                                </div>
                            </form>
                            <form method="GET" class="form-aside-filter-by-price"
                                  action="{{ url('layanan/searchDate') }}">
                                <div class="mv-inputbox-icon right date calendar-picker">
                                    <input type="text" name="tanggal" class="mv-inputbox mv-inputbox-style-1"
                                           placeholder="Cari tanggal yang kosong"/>
                                    <button type="button" class="icon mv-btn mv-btn-style-4 fa fa-calendar"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- .search-sort-->

                    <div class="mv-list-blog-wrapper mv-block-style-15">
                        <div class="row block-15-list mv-list-blog">
                            @foreach ($data as $d)
                                <article class="col-xs-6 col-sm-4 col-md-6 item item-blog-grid-2 post">
                                    <div class="item-inner mv-box-shadow-gray-1">
                                        <div class="item-inner-relative">
                                            <div class="block-15-thumb mv-effect-relative"><a
                                                        href="{{ url('/layanan/detail/'.$d['id_ruangan']) }}"
                                                        title="{{ $d['nm_ruangan'] }}"><span
                                                            style="background-image: url({{ asset('images/simpru/'.$d['tmp_pict']) }});"
                                                            class="block-15-thumb-img"></span></a>
                                            </div>
                                            <!-- .block-15-thumb-->

                                            <div class="block-15-main">
                                                <div class="block-15-main-inner">
                                                    <div class="block-15-title"><a
                                                                href="{{ url('/layanan/detail/'.$d['id_ruangan']) }}"
                                                                title="{{ $d['nm_ruangan'] }}"
                                                                class="mv-overflow-ellipsis">{{ $d['nm_ruangan'] }}</a>
                                                    </div>
                                                    <ul class="block-15-meta mv-ul">
                                                        <li class="meta-item mv-icon-left-style-3"><a href="#"><span
                                                                        class="text"><span class="icon"><i
                                                                                class="fa fa-user"></i></span>{{ $d['kapasitas'] }}</span></a>
                                                        </li>
                                                        <li class="meta-item mv-icon-left-style-3"><a href="#"><span
                                                                        class="text"><span class="icon"><i
                                                                                class="fa fa-map-marker"></i></span>{{ $d['lokasi_ruangan'] }}</span></a>
                                                        </li>
                                                    </ul>
                                                    <div class="block-15-content">
                                                        Ruangan ini terletak di {{ $d['nm_kategori'] }} <br/>
                                                        No HP ( {{ $d['no_hp_ruangan'] }} )
                                                    </div>
                                                    <div class="block-15-read-more">
                                                        {{--@if (!Auth::check())--}}
                                                        {{--<a href="{{ url('login') }}" title="Anda harus login jika meminjam"--}}
                                                        {{--class="mv-btn mv-btn-style-1 btn-1-h-40 btn-1-gray responsive-btn-1-type-5 btn-read-more"><span--}}
                                                        {{--class="btn-inner"><i--}}
                                                        {{--class="btn-icon fa fa-sign-in"></i><span--}}
                                                        {{--class="btn-text">login</span></span></a><br/> <small style="color: red;">(*)login terlebih dahulu jika ingin meminjam</small>--}}
                                                        {{--@else--}}
                                                        <a href="{{ url('/layanan/detail/'.$d['id_ruangan']) }}" target="_blank"
                                                           class="mv-btn mv-btn-style-1 btn-1-h-40 btn-1-gray responsive-btn-1-type-5 btn-read-more"
                                                           {{--data-toggle="modal" data-target="#popuptambahjadwal"--}}
                                                           data-ruangan="{{ $d['id_ruangan'] }}"><span
                                                                    class="btn-inner"><i
                                                                        class="btn-icon fa fa-calendar-check-o"></i><span
                                                                        class="btn-text">Lihat Detail & Jadwal</span></span></a>
                                                        {{--@endif--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .block-15-main-->
                                        </div>
                                    </div>
                                </article>
                                <!-- .post-->
                            @endforeach
                        </div>
                    </div>
                    <!-- .mv-list-blog-wrapper-->
                    <div class="mv-pagination-wrapper">
                        <div class="mv-pagination-style-1 has-count-post">
                            <div class="count-post mv-title-style-10"><span class="number">{{ $data->perPage() }}</span>
                                Ruangan dari <span class="number">{{ $data->lastPage() }}</span> Halaman
                            </div>
                            {{ $data->links('vendor.pagination.custom_pagination') }}
                        </div>
                        <!-- .mv-pagination-style-1-->
                    </div>
                    <!-- .mv-pagination-wrapper-->

                </div>
                <!-- .mv-c-s-content-->

                <div class="mv-c-s-sidebar col-xs-12 col-md-4 col-lg-3 hidden-xs hidden-sm">
                    <div class="mv-c-s-sidebar-inner">
                        @include('layouts._cari')

                    </div>
                </div>
                <!-- .mv-c-s-sidebar-->
            </div>
        </div>
    </section>

    <div id="popuptambahjadwal" tabindex="-1" role="dialog" aria-hidden="true"
         class="modal fade modal-full-width modal-middle modal-effect-zoom mv-modal-style-1">
        <div class="container h-full">
            <div class="modal-dialog-wrapper">
                <div class="modal-dialog">
                    <div class="modal-dialog-inner">
                        <div class="modal-content">
                            <button type="button" data-dismiss="modal" aria-label="Close"
                                    class="mv-btn mv-btn-style-4 modal-close"><i class="fa fa-close"></i></button>

                            <div class="mv-block-style-32">
                                <div class="block-32-form" style="margin-bottom: 0px; padding: 35px 35px 35px;">
                                    <div class="block-32-form-main">
                                        <div id="content-inner" style="max-height: 500px">

                                        </div>
                                        <!-- .form-contact-->
                                    </div>
                                    <!-- .block-32-form-main-->
                                </div>
                                <!-- .block-32-form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- .mv-main-body-->
@endsection
@section('script')
    <script>
        $('#popuptambahjadwal').on('hidden.bs.modal', function (e) {
            $('#calendar').remove();
        });

        $('#popuptambahjadwal').on('shown.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('ruangan');
            $.ajax({
                type: "GET",
                url: "{{ url('booking/getPilihJadwal') }}/" + id,
                success: function (data) {
                    $('#content-inner').html(data.calendar);
                    $('#content-inner').append(data.script);
                    $("#calendar").fullCalendar('option', 'height', 'parent');
                    $("#calendar").fullCalendar('render');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        $(function () {

            $('.calendar-picker').datetimepicker({
                pickDate: true,
                format: 'YYYY-MM-DD HH:mm:ss',
                pickSeconds: false,
                pick12HourFormat: false
            });
        });
    </script>
@endsection