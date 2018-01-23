@extends('admin.layouts.app')
@section('title', 'Home')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Daftar
                <small>Peminjaman</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Booking</a></li>
                <li class="active">View</li>
            </ol>
        </section>


        <!-- Main content -->
        <section class="content">
            @if(session()->has('messages'))
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-{{ session()->get('messages')[1] }} alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5>
                                <i class="icon fa fa-{{ session()->get('messages')[2] }}"></i> {{ ucfirst(session()->get('messages')[1]) }}
                            </h5>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tabel Booking</h3>

                            <a href="/admin/booking/create">
                                <button style="float: right;" class="btn btn-warning ">Tambah Booking</button>
                            </a>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="tabel-default" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Peminjaman</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Status</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $no = 1; ?>
                                @foreach ($booking as $app)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>
                                            <b>User: </b>{{$app->name}} <br/>
                                            <b>Tempat: </b>{{$app->nm_ruangan}} <br/>
                                            <b>Instansi: </b>{{$app->instansi}} <br/>
                                            <b>Tujuan: </b>{{$app->tujuan_pinjam}}
                                            <hr/>
                                            @if($app->berkas_peminjaman !== null)
                                                <a href="{{ asset('storage/booking/surat/'.$app->berkas_peminjaman) }}"
                                                   class="btn bg-aqua btn-xs" target = "_blank"><i class="fa fa-file"></i> Lihat
                                                    Berkas</a>
                                            @else
                                                <span class="label bg-red">Surat belum ada</span>
                                            @endif

                                            @if($app->pembayaran !== null)
                                                <a href="{{ asset('storage/booking/bukti/'.$app->pembayaran) }}"
                                                   class="btn bg-purple btn-xs" target = "_blank"><i class="fa fa-credit-card"></i> Lihat
                                                    Bukti Pembayaran</a>
                                            @else
                                                <span class="label bg-red">Bukti bayar belum ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>
                                                Tanggal: <span
                                                        class="start-date">{{  date('j M Y', strtotime($app->start_date)) }}</span></strong>
                                            <br/>
                                            Jam <span
                                                    class="start-time">{{  date('H:i', strtotime($app->start_date)) }}</span>
                                        </td>
                                        <td>
                                            <strong>
                                                Tanggal: <span
                                                        class="start-date">{{  date('j M Y', strtotime($app->end_date)) }}</span></strong>
                                            <br/>
                                            Jam <span
                                                    class="start-time">{{  date('H:i', strtotime($app->end_date)) }}</span>
                                        </td>
                                        <td><span class="label <?php if ($app->status_verif == '0') {
                                                echo 'bg-blue';
                                            } else if ($app->status_verif == '1') {
                                                echo 'bg-green';
                                            } else {
                                                echo 'bg-red';
                                            } ?>"><?php if ($app->status_verif == '0') {
                                                    echo 'Belum Diverifikasi';
                                                } else if ($app->status_verif == '1') {
                                                    echo 'Verifikasi Diterima';
                                                } else {
                                                    echo 'Verifikasi Ditolak';
                                                } ?></span></td>

                                        <td>
                                            @if($app->status_verif=='0')
                                                <a href="#" class="btn btn-success btn-block btn-flat btn-terima"
                                                   data-target="{{ $app->id_booking_waktu }}" data-status="1"><i
                                                            class="fa fa-check"></i> Terima</a><br/>
                                                <a href="#" class="btn btn-danger btn-block btn-flat btn-tolak"
                                                   data-target="{{ $app->id_booking_waktu }}" data-status="2"><i
                                                            class="fa fa-times"></i> Tolak</a><br/>
                                            @else
                                                <small>Telah diverifikasi oleh <b>{{ $app->admin_verif }}</b></small>
                                                <br/>
                                            @endif

                                            @if($app->status_verif!='1')
                                                    <a href="#" class="btn btn-flat btn-danger btn-hapus" data-target="#form-hapus-{{$no}}"><i
                                                                class="fa fa-trash"></i>Hapus Booking</a>
                                                    <form id="form-hapus-{{ $no }}"
                                                          action="{{ url('admin/booking/destroy') }}" method="post">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="booking" value="{{ $app->id_booking }}">
                                                        <input type="hidden" name="booking_waktu" value="{{ $app->id_booking_waktu }}">

                                                    </form>
                                            @endif
                                        </td>


                                    </tr>
                                    <?php $no++; ?>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div id="dialog-terima"
         title="Masukkan pesan jika diperlukan">
        <form role="form" id="form-terima" class="form-horizontal"
              action="/admin/booking/verif"
              method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <fieldset>
                {{--<label for="keterangan">Keterangan</label>--}}
                <textarea name="keterangan" placeholder="Masukkan keterangan"
                          class="text ui-widget-content ui-corner-all" cols="75"></textarea>
                <input type="hidden" id="id_booking_waktu_terima" name="id_booking_waktu">
                <input type="hidden" id="status_terima" name="status">
                <!-- Allow form submission with keyboard without duplicating the dialog button -->
                <input type="submit" tabindex="-1"
                       style="position:absolute; top:-1000px">
            </fieldset>
        </form>
    </div>

    <div id="dialog-tolak"
         title="Masukkan pesan jika diperlukan">
        <form role="form" id="form-tolak" class="form-horizontal"
              action="/admin/booking/verif"
              method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <fieldset>
                <textarea name="keterangan" placeholder="Masukkan keterangan"
                          class="text ui-widget-content ui-corner-all" cols="75"></textarea>
                <input type="hidden" id="id_booking_waktu_tolak" name="id_booking_waktu">
                <input type="hidden" id="status_tolak" name="status">
                <!-- Allow form submission with keyboard without duplicating the dialog button -->
                <input type="submit" tabindex="-1"
                       style="position:absolute; top:-1000px">
            </fieldset>
        </form>
    </div>
@endsection
@section('script')
    <script>

        $(function () {

            $('#dialog-terima').dialog({
                autoOpen: false,
                width: 600,
                buttons: {
                    "Submit": function () {
                        $('#form-terima').submit();
                        $(this).dialog("close");
                    },
                    Cancel: function () {
                        $(this).dialog("close");
                    }
                },
//                close: function () {
//                    $('#form-terima').reset();
//                }
            });

            $('#dialog-tolak').dialog({
                autoOpen: false,
                width: 600,
                buttons: {
                    "Submit": function () {
                        $('#form-tolak').submit();
                        $(this).dialog("close");
                    },
                    Cancel: function () {
                        $(this).dialog("close");
                    }
                },
//                close: function () {
//                    $('#form-tolak').reset();
//                }
            });

            $('#tabel-default').dataTable();

            
        })

        $('.btn-terima').click(function () {
                var id = $(this).data('target');
                var status = $(this).data('status');
                $('#id_booking_waktu_terima').val(id);
                $('#status_terima').val(status);
                $('#dialog-terima').dialog('open');
                return false;
            });

            $('.btn-tolak').click(function () {
//                console.log('tolak');
                var id = $(this).data('target');
                var status = $(this).data('status');
                $('#id_booking_waktu_tolak').val(id);
                $('#status_tolak').val(status);
                $('#dialog-tolak').dialog('open');
                return false;
            });

            $('.btn-hapus').click(function () {
//                console.log('tolak');
                var form = $(this).data('target');
                var a = confirm('Apakah anda yakin akan menghapus piminjaman ini? penghapusan yang dilakukan tidak dapat dikembalikan');
                if (a) {
                    $(form).submit();
                }
            });
    </script>
@endsection