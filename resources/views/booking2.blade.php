@extends('layouts.app')
@section('title', 'Booking Ruangan')
@section('main-content')
    <div class="find-place dfind-place">
        <div class="wrap">
            <div class="p-h" style="width:33%;">
                <span>BOOKING</span>
                <label>FORMULIR PEMINJAMAN RUANG</label>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="contact-info">
        <div class="wrap">
            <form method="post" action="{{ url('/createBooking') }}">
                <div class="contact-form">
                    <div class="contact-to">
                        <input type="text" value="Pilih Jadwal" onfocus="this.value = '';"
                        onblur="if (this.value == '') {this.value = 'Pilih Jadwal';}" class="pilih-jadwal"
                        data-target="#modal-1" data-container="#modal-1-content"/>
                        <input type="text" value="Nama Instansi" onfocus="this.value = '';"
                               onblur="if (this.value == '') {this.value = 'Nama Instansi';}"/>
                    </div>
                    <div class="text2">
                    <textarea value="Tujuan peminjaman" onfocus="this.value = '';"
                              onblur="if (this.value == '') {this.value = 'tujuankeperluan';}">Deskripsi Tujuan Peminjaman</textarea>
                    </div>
                    <div class="contact-to" style="margin-bottom:-.5em;">
                        <label style="margin-right:10em;">Upload Surat Peminjaman</label>
                        <label><b>Upload Bukti Pembayaran</b></label>
                    </div>
                    <div class="contact-to">
                        <input type="file" name="pic" class="dropdown">
                        <input type="file" name="pic" class="dropdown" style="margin-left:10px;">
                    </div>
                    <br><br><br><br>
                    <span><input type="submit" class="" value="Booking"></span>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="cd-user-modal" id="modal-1">
        <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container-lg"> <!-- this is the container wrapper -->
            <div id="modal-1-content">
                <div class="modal-content">
                    <!---Full Calendar--->
                    <script>
                        $(document).ready(function () {

                            $('#calendar').fullCalendar({
                                header: {
                                    left: 'prev,next today',
                                    center: 'calendar',
                                    right: 'month,agendaWeek,agendaDay'
                                },
                                locale: 'id',
                                navLinks: true, // can click day/week names to navigate views
                                defaultView: 'agendaWeek',
                                selectable: true,
                                selectHelper: true,
                                select: function(start, end) {
                                    console.log(moment(start).format());
                                    console.log(end);
                                    var title = prompt('Event Title:');
                                    var eventData;
                                    if (title) {
                                        eventData = {
                                            title: title,
                                            start: start,
                                            end: end
                                        };
                                        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                                    }
                                    $('#calendar').fullCalendar('unselect');
                                },
                                editable: true,
                                eventLimit: true, // allow "more" link when too many events
                                events: [
                                    {
                                        title: 'All Day Event',
                                        start: '2017-10-01'
                                    },
                                ]
                            });


                        });

                    </script>

                    <div id='wrap-calendar'>

                        <div id='calendar'></div>

                        <div style='clear:both'></div>

                    </div>
                    <!---End Full Calendar--->
                </div>
            </div>
            <a href="#0" class="cd-close-form">Close</a>
        </div> <!-- cd-user-modal-container -->
    </div> <!-- cd-user-modal -->

@endsection