@extends('admin.layouts.app')
@section('title', 'Create Booking')
@section('style')
    <link rel="stylesheet"
          href="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/select2/select2.css') }}">
    <!---calendar---->
    <link href="{{ asset('libs/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('libs/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print"/>
    <!---end calendar---->
@endsection
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ruangan
                <small>Tambah Ruangan</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ url('admin/booking') }}">Booking</a></li>
                <li class="active">Tambah Booking</li>
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
                            <h3 class="box-title">Tambah Booking</h3>

                            <a href="{{ url('admin/booking') }}">
                                <button style="float: right;" class="btn btn-danger ">Kembali</button>
                            </a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" class="form-horizontal" action="/admin/booking/insert" method="post"
                              enctype="multipart/form-data">
                            <div class="box-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="instansi" class="col-sm-2 control-label">Nama Instansi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="instansi" name="instansi"
                                               placeholder="Masukkan nama instansi">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="tujuan" class="col-sm-2 control-label">Tujuan Peminjaman</label>
                                    <div class="col-sm-10">
                                    <textarea class="textarea" id="tujuan" name="tujuan"
                                              placeholder="Masukkan Tujuan Peminjaman"
                                              style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="surat" class="col-sm-2 control-label">Upload Surat Peminjaman
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="file" name="surat" id="surat" accept="pdf/*|image/*"
                                               class="dropdown">
                                        <p class="help-block">(pdf/image)</p>
                                    </div>
                                </div>
                                {{--<div class="form-group">--}}
                                {{--<label for="bukti" class="col-sm-2 control-label">Upload Bukti Pembayaran--}}
                                {{--</label>--}}
                                {{--<div class="col-sm-10">--}}
                                {{--<input type="file" name="bukti" id="bukti" accept="pdf/*|image/*"--}}
                                {{--class="dropdown">--}}
                                {{--<p class="help-block">(pdf/image)</p>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <label for="bukti" class="col-sm-2 control-label">Tempat dan Waktu
                                    </label>
                                    <div class="col-sm-10">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Ruang</th>
                                                <th style="text-align: center">Lihat Jadwal</th>
                                                <th>Mulai</th>
                                                <th>Selesai</th>
                                                <th style="text-align: center">Opsi</th>
                                            </tr>

                                            </thead>
                                            <tbody id="wrapper-input-row">
                                            @include('admin.booking._row_book', [
                                                'items' => $items,
                                                'list_ruangan' => $ruangan,
                                            ])
                                            <tr id="input-row">
                                                <td>
                                                    <select class="select-ruang" name="ruang[]" style="width: 100%">
                                                        <option value="">----------------</option>
                                                        @foreach($ruangan as $r)
                                                            <option value="{{ $r->id_ruangan }}">{{ $r->nm_ruangan }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td style="text-align: center">
                                                    <a class="btn btn-primary pilih-jadwal" data-toggle="modal"
                                                       data-target="#modal-calendar"><i
                                                                class="fa fa-calendar-plus-o"></i> Pilih Jadwal
                                                    </a>
                                                    <a class="btn btn-primary edit-jadwal" data-toggle="modal"
                                                       style="display: none;"
                                                       data-target="#popupeditjadwal"><i
                                                                class="fa fa-calendar-plus-o"></i> Pilih Jadwal
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="input-group date">
                                                        <input type="text" readonly class="form-control date-input"
                                                               name="start_date[]" placeholder="Terisi otomatis"/> <span
                                                                class="input-group-addon"><span
                                                                    class="glyphicon-calendar glyphicon"></span></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-group date">
                                                        <input type="text" readonly class="form-control date-input"
                                                               name="end_date[]" placeholder="Terisi otomatis"/> <span
                                                                class="input-group-addon"><span
                                                                    class="glyphicon-calendar glyphicon"></span></span>
                                                    </div>
                                                </td>

                                                <td style="text-align: center">
                                                    <a class="btn btn-success tambah-data" onclick="tambah()">
                                                            <span class="glyphicon glyphicon-plus"
                                                                  aria-hidden="true"></span>
                                                    </a>
                                                    <a onclick="hapus($(this))" class="btn btn-danger hapus-data"
                                                       data-target="">
                                                            <span class="fa fa-times hapus-data"
                                                                  aria-hidden="true"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="verif" class="col-sm-2 control-label">
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" name="verif" id="verif" value="yes"> Setujui Peminjaman
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->

                    <!-- Form Element sizes -->

                    <!-- /.box -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade" id="modal-calendar">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pilih Jadwal</h4>
                </div>
                <div class="modal-body">
                    <div id="content-inner" style="max-height: 500px">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="popupeditjadwal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pilih Jadwal</h4>
                </div>
                <div class="modal-body">
                    <div id="content-inner2" style="max-height: 500px">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

@endsection
@section('script')
    <script src="{{ asset('/admin-lte/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('/admin-lte/plugins/select2/select2.full.min.js') }}"></script>
    <!---calendar---->
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/lib/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/fullcalendar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('libs/fullcalendar/locale-all.js') }}"></script>
    <!---end calendar---->
    <script type="text/javascript">
        $(function () {
            $('.select-ruang').select2();
        });

        function tambah() {
            var html = '<tr>\n' +
                '            <td>\n' +
                '                <select class="select-ruang" name="ruang[]" style="width: 100%">\n' +
                '                    <option value="">----------------</option>\n' +
                '                    @foreach($ruangan as $r)' +
                '                        <option value="{{ $r->id_ruangan }}">{{ $r->nm_ruangan }}</option>' +
                '                    @endforeach\n' +
                '                </select>\n' +
                '            </td>\n' +
                '            <td style="text-align: center">\n' +
                '                <a class="btn btn-primary pilih-jadwal" data-toggle="modal"\n' +
                '                        data-target="#modal-calendar"><i\n' +
                '                            class="fa fa-calendar-plus-o"></i> Pilih Jadwal\n' +
                '                </a>\n' +
                '                <a class="btn btn-warning edit-jadwal" data-toggle="modal" style="display: none;"\n' +
                '                      data-target="#popupeditjadwal"><i\n' +
                '                        class="fa fa-calendar-plus-o"></i> Edit Jadwal\n' +
                '                </a>' +
                '            </td>\n' +
                '            <td>\n' +
                '                <div class="input-group date">\n' +
                '                    <input type="text" readonly class="form-control date-input"\n' +
                '                           name="start_date[]" placeholder="Terisi otomatis"/> <span\n' +
                '                            class="input-group-addon"><span\n' +
                '                                class="glyphicon-calendar glyphicon"></span></span>\n' +
                '                </div>\n' +
                '            </td>\n' +
                '            <td>\n' +
                '                <div class="input-group date">\n' +
                '                    <input type="text" readonly class="form-control date-input"\n' +
                '                           name="end_date[]" placeholder="Terisi otomatis"/> <span\n' +
                '                            class="input-group-addon"><span\n' +
                '                                class="glyphicon-calendar glyphicon"></span></span>\n' +
                '                </div>\n' +
                '            </td>\n' +

                '            <td style="text-align: center">\n' +
                '               <a onclick="tambah()" class="btn btn-success tambah-data">\n' +
                '                    <span class="glyphicon glyphicon-plus"\n' +
                '                     aria-hidden="true"></span>\n' +
                '                </a>' +
                '                <a onclick="hapus($(this))" class="btn btn-danger hapus-data" data-target="">\n' +
                '                    <span class="fa fa-times hapus-data"\n' +
                '                          aria-hidden="true"></span>\n' +
                '                </a>\n' +
                '            </td>\n' +
                '        </tr>';
            $("#wrapper-input-row").append(html);

            $('.select-ruang').select2();
        }

        function hapus(el) {
            var i = confirm('Apakah anda yakin ingin menghapus peminjaman ini?');
            if (i) {
                var row = el.parent().closest("tr");
                var rowId = el.data('target');
                if (rowId != '') {
                    var host = window.location.protocol + '//' + window.location.host;
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "DELETE",
                        url: host + '/admin/booking/hapusBook/' + rowId,
                        success: function (data) {
                            row.fadeOut(300, function () {
                                row.remove();
                            });
                            // console.log(row.closest('.post'));
                            alert(data.response.message);
                        },
                        error: function (data) {
                            console.log('Error:', data.response.message);
                        }
                    });
                }
                else {
                    row.fadeOut(300, function () {
                        row.remove();
                    });
                }
            }
        }

        $('#modal-calendar').on('hidden.bs.modal', function (e) {
            $(e.relatedTarget).hide();
            $(e.relatedTarget).parent().find('.edit-jadwal').show();
            $('#calendar').remove();
        });

        $('#modal-calendar').on('shown.bs.modal', function (e) {
            var id = $(e.relatedTarget).parent().closest('tr').find(".select-ruang").val();
            if (id != '') {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/booking/getPilihJadwal') }}/" + id,
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
            }
            else {
                $('#content-inner').html('Silahkan pilih ruangan dahulu untuk melihat jadwal!');
            }

        });

        $('#popupeditjadwal').on('shown.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('rowid');
            var ruang = $(e.relatedTarget).parent().closest('tr').find(".select-ruang").val();
            if (ruang != '') {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/booking/getPilihEditJadwal') }}/" + id + "/" + ruang,
                    success: function (data) {
                        $('#content-inner2').html(data.calendar);
                        $('#content-inner2').append(data.script);
                        $("#calendar").fullCalendar('option', 'height', 'parent');
                        $("#calendar").fullCalendar('render');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
            else {
                $('#content-inner2').html('Silahkan pilih ruangan dahulu untuk melihat jadwal!');
            }
        });
        $('#popupeditjadwal').on('hidden.bs.modal', function (e) {
            $('#calendar').remove();
        });
    </script>
@endsection