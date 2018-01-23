@extends('layouts.app')
@section('title', 'Detail Ruangan')
@section('layanan-active', 'active')
@section('main-content')
    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/')  }}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{ url('/layanan')  }}">Layanan</a></li>
                    <li>{{ ucfirst($ruang['nm_ruangan']) }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- .main-breadcrumb-->

    <section class="mv-main-body product-detail-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="post">
                <div class="block-info mv-box-shadow-gray-1">
                    <div class="mv-block-style-27">
                        <div class="mv-col-wrapper">
                            <div class="mv-col-left block-27-col-slider">
                                <div class="mv-block-style-26">
                                    <div class="product-detail-slider mv-slick-slide mv-lightbox-style-1">
                                        <div class="block-26-gallery-main">
                                            <div class="slider gallery-main">
                                                @foreach($foto as $f)
                                                    <div class="slick-slide">
                                                        <div class="slick-slide-inner"><a
                                                                    href="{{ asset('images/simpru/'.$f['tmp_pict']) }}"
                                                                    title=""
                                                                    class="mv-lightbox-item"><img
                                                                        src="{{ asset('images/simpru/'.$f['tmp_pict']) }}"
                                                                        alt="{{ ucfirst($ruang['nm_ruangan']) }}"
                                                                        class="block-26-main-img"/></a></div>
                                                    </div>
                                                    <!-- .slick-slide-->
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- .block-26-gallery-main-->

                                        <div class="block-26-gallery-thumbs">
                                            <div class="block-26-gallery-thumbs-inner">
                                                <div class="slider gallery-thumbs">
                                                    @foreach($foto as $f)
                                                        <div class="slick-slide">
                                                            <div class="slick-slide-inner mv-box-shadow-gray-2"><img
                                                                        src="{{ asset('images/simpru/'.$f['tmp_pict']) }}"
                                                                        alt="{{ ucfirst($ruang['nm_ruangan']) }}"
                                                                        class="block-26-thumbs-img"/></div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="slick-slide-control"></div>
                                            </div>
                                        </div>
                                        <!-- .block-26-gallery-thumbs-->
                                    </div>
                                    <!-- .product-detail-slider-->
                                </div>
                                <!-- .mv-block-style-26-->
                            </div>

                            <div class="mv-col-right block-27-col-info">
                                <div class="col-info-inner">
                                    <div class="block-27-info">
                                        <div class="block-27-title">{{ ucfirst($ruang['nm_ruangan']) }}</div>

                                        <div class="block-27-desc">
                                            {{ $ruang['detail_ruangan'] }}
                                        </div>

                                        <div class="block-27-table-info">
                                            <form method="GET">
                                                <table>
                                                    <tr>
                                                        <td>Kapasitas:</td>
                                                        <td>
                                                            {{ $ruang['kapasitas'] }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lokasi:</td>
                                                        <td>
                                                            {{ $ruang['lokasi_ruangan'] }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kontak:</td>
                                                        <td>
                                                            {{ $ruang['no_hp_ruangan'] }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Unit:</td>
                                                        <td>
                                                            {{ $ruang['nm_kategori'] }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- .block-27-info-->

                                    <div class="block-27-message content-message mv-message-style-1">
                                        <div class="message-inner"></div>
                                    </div>
                                    <!-- .block-27-message-->
                                </div>

                                <div class="block-27-button">
                                    <div class="mv-dp-table align-middle">
                                        <div class="mv-dp-table-cell">
                                            <div class="mv-btn-group text-left">
                                                <div class="group-inner">
                                                    @if(Auth::check())
                                                        <button data-mv-href="#jadwal"
                                                                class="mv-btn mv-btn-style-1 btn-1-h-50 responsive-btn-1-type-5 btn-lihat-jadwal">
                                                        <span class="btn-inner"><i
                                                                    class="btn-icon fa fa-calendar-plus-o"></i><span
                                                                    class="btn-text">Pilih Jadwal</span></span></button>
                                                    @else
                                                        <button data-mv-href="#jadwal"
                                                                class="mv-btn mv-btn-style-1 btn-1-h-50 responsive-btn-1-type-5 btn-lihat-jadwal">
                                                        <span class="btn-inner"><i
                                                                    class="btn-icon fa fa-calendar-check-o"></i><span
                                                                    class="btn-text">Lihat Jadwal</span></span></button>
                                                        <br/>
                                                        <small style="color: red;">(*)login terlebih dahulu jika ingin
                                                            meminjam
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .mv-block-style-27-->
                </div>
                <!-- .block-info-->

                <div class="row block-info-more">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-specification">
                        <div class="specification-main mv-tab-style-3 mv-box-shadow-gray-1 mv-bg-white">
                            <ul role="tablist" class="tab-list nav nav-tabs">
                                <li role="presentation" class="active"><a href="#tab31" aria-controls="tab31" role="tab"
                                                                          data-toggle="tab">FASILITAS</a></li>
                                <li role="presentation"><a href="#tab32" aria-controls="tab32" id="jadwal" role="tab"
                                                           data-toggle="tab">JADWAL</a></li>
                                <li role="presentation"><a href="#tab33" aria-controls="tab33" role="tab"
                                                           data-toggle="tab">KETENTUAN</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="tab31" role="tabpanel" class="tab-pane active">
                                    {!! $ruang['fasilitas_ruangan'] != '' ? $ruang['fasilitas_ruangan'] : 'Fasilitas sementara belum diperbarui oleh admin.' !!}
                                </div>
                                <div id="tab32" role="tabpanel" class="tab-pane" style="max-height: 600px">
                                    @if(!Auth::check())
                                        <div style="color: red; font-style: italic; text-align: center;">
                                            Jika anda ingin memilih jadwal pada kalender di bawah ini, silakan login
                                            terlebih dahulu!
                                        </div>
                                        <br/>
                                    @endif
                                    @include('_modal_detail', [
                                        'id' => $id,
                                        'jadwal' => $jadwal,
                                        'aturan' => $aturan
                                    ])
                                    @yield('calendar')
                                </div>
                                <div id="tab33" role="tabpanel" class="tab-pane">
                                    {!! $ruang['ketentuan_ruangan'] != '' ? $ruang['ketentuan_ruangan'] : 'Ketentuan sementara belum diperbarui oleh admin.' !!}
                                </div>
                            </div>
                        </div>
                        <!-- .specification-main-->
                    </div>


                </div>
            </div>
            <!-- .post-->
        </div>
    </section>
    <!-- .mv-main-body-->
@endsection
@section('script')
    <script>

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $('#calendar').fullCalendar('render');
            $("#calendar").fullCalendar('option', 'height', 'parent');
            $('#calendar').fullCalendar('option', 'contentHeight', 400);
        });

        $('.btn-lihat-jadwal').click(function (e) {
            e.preventDefault();
            $('#jadwal').click();
        })
    </script>
    @yield('script-calendar')
@endsection