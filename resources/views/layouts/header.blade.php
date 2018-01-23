<header class="header mv-header-style-1 mv-wrap">
    <div class="header-top hidden-xs">
        <div class="container" style="background-color:#2C3E50;">
            <div class="header-top-inner">
                <div class="mv-col-wrapper">
                    <div class="mv-col-left header-contact">
                        {{--<ul class="mv-ul clearfix group-contact hidden-xs">--}}
                            {{--<li class="item-button mv-icon-left-style-2"><span class="text"> <span class="icon"><i--}}
                                                {{--class="fa fa-clock-o"></i></span>24/7 Support</span></li>--}}
                            {{--<li class="item-button mv-icon-left-style-2"><a href="tel:(+800)123456789" class="text">--}}
                                    {{--<span class="icon"><i class="fa fa-phone"></i></span>Telephone: (+6281) 550--}}
                                    {{--54321</a></li>--}}
                        {{--</ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .header-top-->

    <div class="header-main-nav mv-fixed-enabled">
        <div class="container">
            <div class="container-inner">
                <div class="header-toggle-off-canvas hidden-md hidden-lg">
                    <button type="button" class="mv-btn mv-btn-style-5 btn-off-canvas-toggle click-btn-off-canvas-left">
                        <i class="icon fa fa-bars"></i></button>
                </div>
                <!-- .header-toggle-off-canvas-->

                <div class="header-logo">
                    <a href="{{ url('/') }}" title="SIMPRU">
                        <img src="{{ asset('images/logo/logo_simpru.png') }}" alt="logo"
                             class="logo-img img-default image-live-view">
                        <img src="{{ asset('images/logo/logo_simpru.png') }}" alt="logo"
                             class="logo-img img-scroll image-live-view"></a>
                </div>
                <!-- .header-logo-->
                <div class="main-nav-wrapper hidden-xs hidden-sm">
                    <nav class="main-nav">
                        <ul class="nav sf-menu">
                            <li class="@yield('beranda-active')"><a href="{{ url('/') }}"><span class="menu-text">Beranda</span></a>
                            </li>
                            <li class="@yield('layanan-active') mega-columns"><a href="{{ url('layanan') }}"><span class="menu-text">Kategori <i class="menu-icon fa fa-angle-down"></i></span></a>
                                <ul class="row">
                                    @foreach($data_kategori as $kategori => $values)
                                        <li class="col-xs-3 mega-col"><a href="{{ url('layanan/kategori/'.$values['id']) }}" class="mega-title"><span class="menu-text">{{ $kategori }}</span></a>
                                            <ul class="mega-content">
                                                @foreach($values['items'] as $val)
                                                    <li><a href="{{ url('layanan/kategori/'.$val->id_kategori_ruangan) }}">{{ $val->nm_kategori }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="@yield('faq-active')"><a href="{{ url('/faq') }}"><span
                                            class="menu-text">FAQ</span></a></li>
                            <li class="@yield('about-active')"><a href="{{ url('/about') }}"><span
                                            class="menu-text">Tentang Kami</span></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right-button">
                    <!-- .header-main-nav-->
                    <div class="header-search">
                        <div class="item-button">
                            <button type="button" data-toggle="modal" data-target="#popupSearch"
                                    class="mv-btn mv-btn-style-10 btn-open-field-search"><i class="fa fa-search"></i>
                            </button>
                            <button type="button"
                                    class="mv-btn mv-btn-style-10 btn-open-filter click-btn-off-canvas-right hidden-md hidden-lg">
                                <i class="fa fa-filter mv-f-18"></i></button>
                        </div>
                    </div>
                    {{--<!-- .header-search-->--}}
                    <div class="main-nav-wrapper hidden-xs hidden-sm">
                        <nav class="main-nav">
                            <ul class="nav sf-menu">
                                @if (Auth::check())
                                    <li class="@yield('user-active')"><a href="#"><span class="menu-text">{{ Auth::user()->name }}
                                                <i class="menu-icon fa fa-angle-down"></i></span></a>
                                        <ul style="margin-top:-20px">
                                            <li><a href="{{url('/pengguna')}}">Profil</a></li>
                                            <li><a href="{{url('/pengguna/transaksi')}}">Lihat Transaksi</a></li>
                                            <hr/>
                                            <li>
                                                <a href="{{ url('/logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{url('login')}}"><span class="menu-text login-button">Masuk</span></a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="header-shop" id="book-header">
                        @include('layouts._header_items')
                    </div>
                    <!-- .header-shop-->
                </div>
            </div>
        </div>
    </div>
    <!-- .header-main-nav-->
</header>
<!-- .header-->