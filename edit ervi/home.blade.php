@extends('layouts.app')
@section('title', 'Home')
@section('beranda-active', 'active')
@section('main-content')
    <section class="home-2-slideshow mv-wrap">
        <div id="home-2-slideshow" class="mv-caroufredsel">
            <ul class="mv-slider-wrapper">
                <li class="mv-slider-item"><img src="{{ asset('images/slideshow/slide.png') }}" alt="slide" class="mv-slider-img"/>
                    <div class="mv-caption-style-2">
                        <div class="container"><img src="{{ asset('images/icon/icon_stars.png') }}" alt="icon" class="caption-2-img-1"/>
                            <div class="caption-2-text-1">Sistem Informasi Manajemen Peminjaman Ruang</div>
                        </div>
                        <a href="{{ url('/layanan') }}"
                           class="caption-1-button-1 mv-btn mv-btn-style-1 responsive-btn-1-type-2">
                      <span class="btn-inner">
                        <i class="btn-icon fa fa-calendar-plus-o"></i>
                        <span class="btn-text">Pinjam Sekarang</span>
                      </span>
                        </a>
                    </div>
                </li>
            </ul>
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
                        <button data-filter=".sains" class="mv-btn mv-btn-style-8 active">FS</button>
                        <button data-filter=".fti" class="mv-btn mv-btn-style-8">FTI</button>
                        <button data-filter=".fte" class="mv-btn mv-btn-style-8">FTE</button>
                        <button data-filter=".ftslk" class="mv-btn mv-btn-style-8">FTSLK</button>
                        <button data-filter=".fadp" class="mv-btn mv-btn-style-8">FADP</button>
                        <button data-filter=".ftk" class="mv-btn mv-btn-style-8">FTK</button>
                        <button data-filter=".fmks" class="mv-btn mv-btn-style-8">FMKS</button>
                        <button data-filter=".ftik" class="mv-btn mv-btn-style-8">FTIK</button>
                        <button data-filter=".fbmt" class="mv-btn mv-btn-style-8">FBMT</button>
                        <button data-filter=".fv" class="mv-btn mv-btn-style-8">FV</button>
                        <button data-filter=".fasum" class="mv-btn mv-btn-style-8">Fasum</button>
                    </div>
                </div>
                <!-- .filter-button-->

                <div class="row filter-list-warpper">
                    <div class="filter-list mv-block-style-17">
                        <div class="block-17-list">
                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post sains">
                                <div class="home-3-logo-brand-slider mv-caroufredsel">
                                    <div class="block-17-slider-inner">
                                        <div class="row">
                                            <ul class="mv-slider-wrapper" data-prev="#fs-prev" data-next="#fs-next">
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
															<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a></div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
														<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
														<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
															<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .block-17-main-inner-->

                                        <button id="fs-prev" type="button"
                                                class="mv-slider-control-btn prev mv-btn mv-btn-style-3 responsive-btn-3-type-1">
                                            <i class="btn-icon fa fa-angle-left"></i></button>
                                        <button id="fs-next" type="button"
                                                class="mv-slider-control-btn next mv-btn mv-btn-style-3 responsive-btn-3-type-1">
                                            <i class="btn-icon fa fa-angle-right"></i></button>

                                    </div>
                                    <!-- .block-17-main-->
                                </div>
                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post fti">
                                <div class="home-3-logo-brand-slider mv-caroufredsel">
                                    <div class="block-17-slider-inner">
                                        <div class="row">
                                            <ul class="mv-slider-wrapper" data-prev="#fti-prev" data-next="#fti-next">
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
															<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a></div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
															<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
															<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
															<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                                <li class="mv-slider-item col-xs-6 col-sm-4 col-md-2">
                                                    <div class="mv-dp-table align-middle slider-item-inner">
                                                        <div class="mv-dp-table-cell"><a href="#" target="_blank"><img
                                                                        src="images/logo-brand/room.png"
                                                                        alt="logo_brand"/></a>
															<p>Departemen 1</p>
														</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .block-17-main-inner-->

                                        <button id="fti-prev" type="button"
                                                class="mv-slider-control-btn prev mv-btn mv-btn-style-3 responsive-btn-3-type-1">
                                            <i class="btn-icon fa fa-angle-left"></i></button>
                                        <button id="fti-next" type="button"
                                                class="mv-slider-control-btn next mv-btn mv-btn-style-3 responsive-btn-3-type-1">
                                            <i class="btn-icon fa fa-angle-right"></i></button>

                                    </div>
                                    <!-- .block-17-main-->
                                </div>
                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post fte">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post ftslk">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post fadp">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post ftk">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post fmks">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post ftik">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post fbmt">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post fv">

                            </article>
                            <!-- .post-->

                            <article class="col-xs-12 col-sm-12 col-md-12 item item-filter-home-3 filter-item post fasum">

                            </article>
                            <!-- .post-->

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