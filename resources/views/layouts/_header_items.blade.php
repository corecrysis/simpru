<div class="item-button dropdown mv-dropdown-style-1 script-dropdown-1">
    <button type="button" class="mv-btn mv-btn-style-11 btn-dropdown btn-my-cart"><span class="btn-inner"><span
                    class="icon fa fa-calendar"></span><span class="number count-cart">{{ $total_book }}</span></span>
    </button>
    <div class="dropdown-menu pull-right">
        <div class="dropdown-menu-inner">
            <div class="mv-block-style-39">
                <div class="block-39-header">Kamu telah menambahkan <span
                            class="mv-color-primary count-cart">{{ $total_book }} </span> peminjaman
                </div>
                <div class="block-39-list">
                    @foreach($items_book as $item)
                        <article class="item post">
                            <div class="item-inner">
                                <div class="mv-dp-table align-top">
                                    <div class="mv-dp-table-cell block-39-main">
                                        <div class="block-39-main-inner">
                                            <div class="block-39-title">
                                                <a href="{{ url('layanan/detail/'.$item['id_ruangan']) }}"
                                                   title="{{ $item['nm_ruangan'] }}" class="mv-overflow-ellipsis">
                                                    <strong>
                                                        Ruang: {{  ucfirst($item['nm_ruangan']) }}
                                                    </strong></a>
                                            </div>
                                            <ul class="block-24-meta mv-ul">
                                                <li class="meta-item mv-icon-left-style-3">
                                                    <span class="text">
                                                        @if(date('Y-m-d', strtotime($item['start_date'])) != date('Y-m-d', strtotime($item['end_date'])))
                                                            Tanggal: {{  date('j M Y', strtotime($item['start_date'])) }}
                                                            - {{  date('j M Y', strtotime($item['end_date'])) }}
                                                        @else
                                                            Tanggal: {{  date('j M Y', strtotime($item['start_date'])) }}
                                                        @endif
                                                    </span>
                                                </li>
                                                <li class="meta-item mv-icon-left-style-3">
                                                    <span class="text">
                                                        Jam: {{  date('H:i', strtotime($item['start_date'])) }}
                                                        - {{  date('H:i', strtotime($item['end_date'])) }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <button data-target="{{ $item['rowId'] }}" type="button" title="Remove from Cart"
                                        class="mv-btn mv-btn-style-4 fa fa-close btn-delete-product"></button>
                            </div>
                        </article>
                @endforeach
                <!-- .post-->
                </div>
                @if(count($items_book) > 0)
                    <div class="block-39-footer">
                        <div class="row">
                            <div class="col-xs-6"><a href="{{ url('booking/lihatDaftar') }}"
                                                     class="mv-btn mv-btn-style-5 btn-5-h-45 btn-5-gray responsive-btn-5-type-2 mv-btn-block">Ubah</a>
                            </div>
                            <div class="col-xs-6"><a href="{{ url('booking') }}"
                                                     class="mv-btn mv-btn-style-5 btn-5-h-45 responsive-btn-5-type-2 mv-btn-block">Booking</a>
                            </div>
                        </div>
                        {{--<div class="row">--}}
                            {{----}}
                        {{--</div>--}}
                    </div>
                @endif
            </div>
            <!-- .mv-block-style-39-->
        </div>
    </div>
</div>