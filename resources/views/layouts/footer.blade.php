<footer class="footer mv-footer-style-3 mv-wrap" style="background-color:#2C3E50;">
    <div class="footer-bg">
        <div class="container-fluid">
            <div class="footer-inner">
                <div class="footer-bottom">
                    <div class="row">
                        <div class="col-sm-4 col-md-3 col-payment">

                        </div>

                        <div class="col-sm-6 col-md-6 col-copyright">
                            <div class="footer-copyright text-center">Copyright &copy; 2017 SIMPRU by<a
                                        href="https://www.ideola.com/" target="_blank"> SEV.</a> All Rights Reserved.
                            </div>
                            <!-- .footer-copyright-->
                        </div>

                        <div class="col-sm-2 col-md-3 col-back-to-top text-center">
                            <button type="button" class="mv-btn mv-btn-style-13 mv-back-to-top"><i
                                        class="btn-icon fa fa-long-arrow-up"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="mv-btn mv-btn-style-17 mv-back-to-top fixed-right-bottom"><i
                class="btn-icon fa fa-long-arrow-up"></i></button>
</footer>
<!-- .footer-->

<div class="off-canvas-wrapper-left hidden-md hidden-lg">
    <div class="off-canvas-left">
        <div class="off-canvas-header">
            <button class="btn-close-off-canvas click-close-off-canvas">x</button>
        </div>
        <div class="off-canvas-body">
            <nav class="main-nav">
                <ul class="nav sf-menu">
                    <li><a href="{{ url('/') }}"><span class="menu-text">Beranda</span></a></li>
                    <li class="mega-columns"><a href="{{ url('layanan') }}"><span class="menu-text">Kategori <i class="menu-icon fa fa-angle-down"></i></span></a>
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
                    <li><a href="{{ url('/faq') }}"><span class="menu-text">FAQ</span></a></li>
                    <li><a href="{{ url('/about') }}"><span class="menu-text">Tentang Kami</span></a></li>
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
    </div>
</div>
<!-- .off-canvas-wrapper-left-->

<div class="off-canvas-wrapper-right hidden-md hidden-lg">
    <div class="off-canvas-right">
        <div class="off-canvas-header">
            <button class="btn-close-off-canvas click-close-off-canvas">x</button>
        </div>

        <div class="off-canvas-body">
            @include('layouts._cari')
        </div>
    </div>
</div>
<!-- .off-canvas-wrapper-right-->

{{--search button--}}

<div id="popupSearch" tabindex="-1" role="dialog" aria-hidden="true" class="popup-search modal fade modal-effect-zoom mv-modal-style-2" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="GET" class="form-search" action="{{ url('layanan/searchQuery') }}">
                <div class="mv-inputbox-icon right">
                    <input type="text" name="q_cari" data-mv-placeholder="Cari ruangan, kapasitas atau lokasi" placeholder="Cari ruangan, kapasitas atau lokasi" class="mv-inputbox mv-inputbox-style-5">
                    <button type="submit" class="icon mv-btn mv-btn-style-4"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>