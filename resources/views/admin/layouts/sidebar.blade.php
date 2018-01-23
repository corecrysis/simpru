<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="@yield('home-active')"><a href="/admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="@yield('ruangan-active') treeview">
                <a href="#"><i class="fa fa-bank"></i> <span>Ruangan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('tambah-ruangan-active')"><a href="/admin/ruang/create"><i class="fa fa-plus"></i> <span>Tambah Ruangan</span></a></li>
                    <li class="@yield('lihat-ruangan-active')"><a href="/admin/ruang"><i class="fa fa-eye"></i> <span>Lihat Ruangan</span></a></li>
                </ul>
            </li>
            <li class="@yield('booking-active') treeview">
                <a href="#"><i class="fa fa-calendar-o"></i> <span>Peminjaman</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('tambah-booking-active')"><a href="/admin/booking/create"><i class="fa fa-calendar-plus-o"></i> <span>Tambah Peminjaman</span></a></li>
                    <li class="@yield('lihat-booking-active')"><a href="/admin/booking"><i class="fa fa-calendar-check-o"></i> <span>Lihat/Validasi Peminjaman</span></a></li>
                    <li class="@yield('lihat-booking-active')"><a href="/admin/booking/validview"><i class="fa fa-calendar-check-o"></i> <span>Peminjaman Sudah Validasi</span></a></li>
                </ul>
            </li>
            <li class="@yield('blacklist-active') treeview">
                <a href="#"><i class="fa fa-user-times"></i> <span>Blacklist</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('tambah-blacklist-active')"><a href="/admin/blacklistpengguna/create"><i class="fa fa-plus"></i> <span>Tambah Blacklist</span></a></li>
                    <li class="@yield('lihat-blacklist-active')"><a href="/admin/blacklistpengguna"><i class="fa fa-eye"></i> <span>Lihat Daftar Blacklist</span></a></li>
                </ul>
            </li>
            <li class="@yield('blacklist-active') treeview">
                <a href="#"><i class="fa fa-newspaper-o"></i> <span>Rekapan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('rekap-active')"><a href="/admin/rekap"><i class="fa fa-eye"></i> <span>Rekap</span></a></li>
                    
                </ul>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->status_admin == 'super_admin')
            <li class="@yield('master-active') treeview">
                <a href="#"><i class="fa fa-cogs"></i> <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="@yield('master-kategori-active') treeview">
                        <a href="#"><i class="fa fa-cog"></i> <span>Master Kategori</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('tambah-fakultas-active')"><a href="/admin/kategori/create"><i class="fa fa-building"></i> <span>Tambah Fakultas/Unit</span></a>
                            </li>
                            <li class="@yield('tambah-departemen-active')"><a href="/admin/kategori/createdept"><i class="fa fa-briefcase"></i> <span>Tambah Departemen</span></a>
                            </li>
                            <li class="@yield('lihat-kategori-active')"><a href="/admin/kategori"><i class="fa fa-eye"></i>
                                    <span>Lihat Semua Kategori</span></a></li>
                        </ul>
                    </li>
                    <li class="@yield('master-pengguna-active') treeview">
                        <a href="#"><i class="fa fa-cog"></i> <span>Master Pengguna</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('tambah-pengguna-active')"><a href="/admin/pengguna/create"><i class="fa fa-user-circle"></i>
                                    <span>Tambah Pengguna</span></a></li>
                            <li class="@yield('lihat-pengguna-active')"><a href="/admin/pengguna"><i class="fa fa-eye"></i> <span>Lihat Pengguna</span></a></li>
                        </ul>
                    </li>
                    <li class="@yield('master-admin-active') treeview">
                        <a href="#"><i class="fa fa-cog"></i> <span>Master Admin</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="@yield('tambah-admin-active')"><a href="/admin/admin/create"><i class="fa fa-user-secret"></i>
                                    <span>Tambah Admin</span></a></li>
                            <li class="@yield('lihat-admin-active')"><a href="/admin/admin"><i class="fa fa-eye"></i> <span>Lihat Admin</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            @endif
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>