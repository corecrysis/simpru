@extends('layouts.app')
@section('title', 'Daftar Peminjaman')
@section('layanan-active', 'active')
@section('main-content')
    <section class="mv-main-body cart-main mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="cart-inner">
                <div class="cart-block block-cart-table mv-bg-white mv-box-shadow-gray-1 mv-mb-50">
                    <div class="mv-table-responsive">
                        @if(count($data) >0 )
                            <table class="mv-table-style-2">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">#</th>
                                        <th>Ruangan</th>
                                        <th style="width: 20%">Waktu Mulai</th>
                                        <th style="width: 20%">Waktu Berakhir</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < count($data) ; $i++)
                                    <tr class="calculate-price-wrapper post">
                                        <td style="text-align: center">{{ $i+1 }}</td>
                                        <td>
                                            <div class="mv-block-style-24">
                                                <div class="block-24-list">
                                                    <article class="item item-cart">
                                                        <div class="item-inner">
                                                            <div class="mv-dp-table">
                                                                <div class="mv-dp-table-cell block-24-main">
                                                                    <div class="block-24-title"><a
                                                                                href="{{ url('layanan/detail/'.$data[$i]['id_ruangan']) }}"
                                                                                title="{{ $data[$i]['nm_ruangan'] }}"
                                                                                class="mv-overflow-ellipsis">{{ ucfirst($data[$i]['nm_ruangan']) }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="width: 20%">
                                            <div class="mv-font-secondary">
                                                <strong>
                                                    Tanggal: <span
                                                            class="start-date">{{  date('j M Y', strtotime($data[$i]['start_date'])) }}</span>
                                                </strong>
                                                <br/>
                                                Jam <span
                                                        class="start-time">{{  date('H:i', strtotime($data[$i]['start_date'])) }}</span>
                                            </div>
                                        </td>
                                        <td style="width: 20%">
                                            <div class="mv-font-secondary">
                                                <strong>
                                                    Tanggal: <span
                                                            class="end-date">{{  date('j M Y', strtotime($data[$i]['end_date'])) }}</span>
                                                </strong>
                                                <br/>
                                                Jam <span
                                                        class="end-time">{{  date('H:i', strtotime($data[$i]['end_date'])) }}</span>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="#" title="Edit peminjaman" data-toggle="modal" data-target="#popupeditjadwal" data-rowid="{{ $data[$i]['rowId'] }}" data-ruangan="{{ $data[$i]['id_ruangan'] }}"
                                               class="mv-btn mv-btn-style-3 responsive-btn-3-type-1 btn-change-jadwal"><i class="fa fa-edit"></i></a>
                                            <hr/>
                                            <a href="#" title="Hapus peminjaman" data-target="{{ $data[$i]['rowId'] }}"
                                                    class="mv-btn mv-btn-style-3 responsive-btn-3-type-1 btn-delete-product" style="color: #9f191f"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        @else
                            Daftar peminjaman kosong, silakan mulai untuk meminjam
                        @endif
                    </div>
                </div>
                <!-- .block-cart-table-->
                @if(count($data) > 0 )
                    <div class="cart-block block-coupon-code mv-mb-50">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-cart-totals">
                                <div class="mv-well-style-2 mv-box-shadow-gray-1 mv-bg-white">
                                    <div class="well-2-body">
                                        <a href="{{ url('/booking') }}"
                                           class="mv-btn mv-btn-style-5 mv-btn-block btn-5-h-45">Lanjut
                                            ke Peminjaman
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            <!-- .block-coupon-code-->
            </div>
        </div>
    </section>
    <div id="popupeditjadwal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade modal-full-width modal-middle modal-effect-zoom mv-modal-style-1">
        <div class="container h-full">
            <div class="modal-dialog-wrapper">
                <div class="modal-dialog">
                    <div class="modal-dialog-inner">
                        <div class="modal-content">
                            <button type="button" data-dismiss="modal" aria-label="Close" class="mv-btn mv-btn-style-4 modal-close"><i class="fa fa-close"></i></button>

                            <div class="mv-block-style-32">
                                <div class="block-32-form" style="margin-bottom: 0px; padding: 35px 35px 35px;">
                                    <div class="block-32-form-main">
                                        <div id="content-inner" style="max-height: 500px"></div>
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
@endsection
@section('script')
    <script>
        $('#popupeditjadwal').on('shown.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('rowid');
            var ruang = $(e.relatedTarget).data('ruangan');
            $.ajax({
                type: "GET",
                url: "{{ url('booking/getPilihEditJadwal') }}/"+id+"/"+ruang,
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
        $('#popupeditjadwal').on('hidden.bs.modal', function (e) {
            $('#calendar').remove();
        });
    </script>
@endsection