@extends('layouts.app')
@section('title', 'Home')
@section('beranda-active', 'active')
@section('main-content')
    <section class="home-2-slideshow mv-wrap">
        <div id="home-2-slideshow" class="mv-caroufredsel">
            <ul class="mv-slider-wrapper">
                <li class="mv-slider-item"><img src="{{ asset('images/slideshow/slide.jpg') }}" alt="slide"
                                                class="mv-slider-img"/>
                    <div class="mv-caption-style-2">
                        <div class="container"><img src="{{ asset('images/icon/icon_stars.png') }}" alt="icon"
                                                    class="caption-2-img-1"/>
                            <div class="caption-2-text-1">Sistem Informasi Manajemen Peminjaman Ruang</div>
                            <a href="{{ url('/layanan') }}"
                               class="caption-2-button-1 mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                              <span class="btn-inner">
                                <i class="btn-icon fa fa-calendar-plus-o"></i>
                                <span class="btn-text">Lihat Ruangan</span>
                              </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="mv-slider-item"><img src="{{ asset('images/slideshow/graha_its_home.jpg') }}" alt="slide"
                                                class="mv-slider-img"/>
                    <div class="mv-caption-style-2">
                        <div class="container"><img src="{{ asset('images/icon/icon_stars.png') }}" alt="icon"
                                                    class="caption-2-img-1"/>
                            <div class="caption-2-text-1">Sistem Informasi Manajemen Peminjaman Ruang</div>
                            <a href="{{ url('/layanan') }}"
                               class="caption-2-button-1 mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                              <span class="btn-inner">
                                <i class="btn-icon fa fa-calendar-plus-o"></i>
                                <span class="btn-text">Lihat Ruangan</span>
                              </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="mv-slider-item"><img src="{{ asset('images/slideshow/bundaran_its_home.jpg') }}" alt="slide"
                                                class="mv-slider-img"/>
                    <div class="mv-caption-style-2">
                        <div class="container"><img src="{{ asset('images/icon/icon_stars.png') }}" alt="icon"
                                                    class="caption-2-img-1"/>
                            <div class="caption-2-text-1">Sistem Informasi Manajemen Peminjaman Ruang</div>
                            <a href="{{ url('/layanan') }}"
                               class="caption-2-button-1 mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                              <span class="btn-inner">
                                <i class="btn-icon fa fa-calendar-plus-o"></i>
                                <span class="btn-text">Lihat Ruangan</span>
                              </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="mv-slider-item"><img src="{{ asset('images/slideshow/perpustakaan_home.jpg') }}" alt="slide"
                                                class="mv-slider-img"/>
                    <div class="mv-caption-style-2">
                        <div class="container"><img src="{{ asset('images/icon/icon_stars.png') }}" alt="icon"
                                                    class="caption-2-img-1"/>
                            <div class="caption-2-text-1">Sistem Informasi Manajemen Peminjaman Ruang</div>
                            <a href="{{ url('/layanan') }}"
                               class="caption-2-button-1 mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                              <span class="btn-inner">
                                <i class="btn-icon fa fa-calendar-plus-o"></i>
                                <span class="btn-text">Lihat Ruangan</span>
                              </span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="mv-slider-item"><img src="{{ asset('images/slideshow/robotika_home.jpg') }}" alt="slide"
                                                class="mv-slider-img"/>
                    <div class="mv-caption-style-2">
                        <div class="container"><img src="{{ asset('images/icon/icon_stars.png') }}" alt="icon"
                                                    class="caption-2-img-1"/>
                            <div class="caption-2-text-1">Sistem Informasi Manajemen Peminjaman Ruang</div>
                            <a href="{{ url('/layanan') }}"
                               class="caption-2-button-1 mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                              <span class="btn-inner">
                                <i class="btn-icon fa fa-calendar-plus-o"></i>
                                <span class="btn-text">Lihat Ruangan</span>
                              </span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <button id="home-2-slideshow-prev" type="button" class="mv-slider-control-btn prev mv-btn mv-btn-style-2">
                <span class="icon fa fa-angle-left"></span></button>
            <button id="home-2-slideshow-next" type="button" class="mv-slider-control-btn next mv-btn mv-btn-style-2">
                <span class="icon fa fa-angle-right"></span></button>
        </div>
    </section>

    <!-- .home-3-shop-->
    <section class="home-3-highlight mv-wrap">
        <div class="container">
            <div class="featured-title mv-title-style-2 title-home-3">
                <div class="title-2-inner">
                    <span class="main">Kategori Ruangan</span></div>
            </div>
            <!-- .featured-title-->

            <div class="featured-main mv-filter-style-2">
                <div class="filter-button mv-btn-group">
                    <div class="group-inner">
                        @php
                            $i=0;
                        @endphp
                        @foreach($data_kategori as $kategori => $value)
                            @if($i == 0)
                                <button data-filter=".{{ strtolower($kategori) }}"
                                        class="mv-btn mv-btn-style-8 active">{{ $kategori }}</button>
                            @else
                                <button data-filter=".{{ strtolower($kategori) }}"
                                        class="mv-btn mv-btn-style-8">{{ $kategori }}</button>
                            @endif
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>
                </div>
                <!-- .filter-button-->

                <div class="row filter-list-warpper">
                    <div class="filter-list mv-block-style-17">
                        <div class="block-17-list">
                            @foreach($data_kategori as $kategori => $values)
                                <article
                                        class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post {{ strtolower($kategori) }}">
                                    <div class="home-3-logo-brand-slider mv-caroufredsel">
                                        <div class="block-17-slider-inner">
                                            <div class="row">
                                                <ul class="mv-slider-wrapper"
                                                    data-prev="#{{ strtolower($kategori) }}-prev"
                                                    data-next="#{{ strtolower($kategori) }}-next">
                                                    @if(count($values['items']) > 0)
                                                        @foreach($values['items'] as $val)
                                                            <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                                <div class="mv-dp-table align-middle slider-item-inner">
                                                                    <div class="mv-dp-table-cell"><a
                                                                                href="{{ url('layanan/kategori/'.$val->id_kategori_ruangan) }}"
                                                                                target="_blank"><img
                                                                                    src="images/logo-brand/room.png"
                                                                                    alt="logo_brand"/></a>
                                                                        <p>{{ $val->nm_kategori }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="mv-slider-item col-xs-12"> Maaf kategori belum
                                                            tersedia
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <!-- .block-17-main-inner-->

                                            <button id="{{ strtolower($kategori) }}-prev" type="button"
                                                    class="mv-slider-control-btn prev mv-btn mv-btn-style-3 responsive-btn-3-type-1">
                                                <i class="btn-icon fa fa-angle-left"></i></button>
                                            <button id="{{ strtolower($kategori) }}-next" type="button"
                                                    class="mv-slider-control-btn next mv-btn mv-btn-style-3 responsive-btn-3-type-1">
                                                <i class="btn-icon fa fa-angle-right"></i></button>

                                        </div>
                                        <!-- .block-17-main-->
                                    </div>
                                </article>
                                <!-- .post-->
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- .filter-list-wrapper-->
            </div>
            <!-- .featured-main-->
        </div>
    </section>
    <!-- .home-3-featured-products-->
@endsection