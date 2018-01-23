@section('calendar')
    <div id="calendar">
        <form method="POST" id="form-submit">
            <input type="hidden" value="{{ $id }}" name="id_ruangan">
        </form>
    </div>
@endsection
@section('script-calendar')
    <script>

        $('#calendar').fullCalendar({
            customButtons: {
                myCustomButton: {
                    text: 'Simpan Jadwal',
                    click: function () {
                        var a = confirm('Apakah anda yakin ingin menyimpan pilihan anda?');
                        if (a) {
                            var events = $('#calendar').fullCalendar('clientEvents', function (ev) {
                                return ev.className == 'schedule-event';
                            });
                            var i;
                            $('#form-submit').find(".tambah-event").remove();
                            for (i = 0; i < events.length; ++i) {
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'start-' + events[i].id,
                                    name: 'start_date[]',
                                    class: 'tambah-event',
                                    value: moment(events[i].start).format('YYYY-MM-DD HH:mm:ss'),
                                }).appendTo('#form-submit');

                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'end-' + events[i].id,
                                    name: 'end_date[]',
                                    class: 'tambah-event',
                                    value: moment(events[i].end).format('YYYY-MM-DD HH:mm:ss'),
                                }).appendTo('#form-submit');

                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'row-' + events[i].id,
                                    name: 'rowId[]',
                                    class: 'tambah-event',
                                    value: events[i].id,
                                }).appendTo('#form-submit');
                            }

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: "{{ url('admin/booking/addBooking') }}",
                                data: $("#form-submit").serialize(),
                                success: function (data) {
                                    $.ajax({
                                        type: "GET",
                                        url: "{{ url('admin/booking/updateAdminBook') }}",
                                        success: function (data) {
                                            $('#wrapper-input-row').html(data);
                                            $('#popupeditjadwal').modal('toggle');
//                                            window.location.href = window.location.href
                                        },
                                        error: function (data) {
                                            console.log('Error:', data);
                                        }
                                    });

                                },
                                error: function (data) {
                                    console.log('Error:', data.response.message);

                                }
                            });
                        }
                    },
                }
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek'
            },
            footer: {
                center: 'myCustomButton'
            },
            locale: 'id',
            navLinks: true, // can click day/week names to navigate views
            defaultView: 'agendaWeek',
            validRange: {
                start: moment().format('YYYY-MM-DD')
            },
            handleWindowResize: true,
            windowResize: function (view) {
                $("#calendar").fullCalendar('option', 'height', 'parent');
                $("#calendar").fullCalendar('render');
            },
            firstDay: moment().format('YYYY-MM-DD'),
//            selectable: true,
//            selectHelper: true,
            allDaySlot: false,
            viewRender: function (view) {
                if (view.start.format('YYYY-MM-DD') <= moment().format('YYYY-MM-DD')) {

                    $(".fc-prev-button").prop('disabled', true);
                    $(".fc-prev-button").addClass('fc-state-disabled');
                }
                else {
                    $(".fc-prev-button").removeClass('fc-state-disabled');
                    $(".fc-prev-button").prop('disabled', false);
                }
            },
            eventRender: function (event, element) {
                element.find('div.fc-title').html(element.find('div.fc-title').text()) ;
                element.find('span.fc-title').html(element.find('span.fc-title').text()) ;
                element.find('span.fc-event-title').html(element.find('span.fc-event-title').text());
                element.qtip({
                    content: event.description,
                    show: {
                        solo: true
                    },
                    position: {
                        target: 'mouse',
                        adjust: {mouse: false},
                    },
                    hide: {
                        distance: 30,
                        event: 'unfocus'
                    }
                });
            },
            editable: true,
            slotLabelFormat: "HH:mm",
            eventLimit: true, // allow "more" link when too many events
            events: {!! $jadwal !!},
            eventOverlap: false,
//            selectOverlap:false,
//            unselectAuto: true,
            @php
                if(count(json_decode($aturan)) > 0){
                    echo 'businessHours:'.$aturan.',';
                    echo 'eventConstraint:"businessHours",';
                    echo 'selectConstraint: "businessHours",';
                }
            @endphp
        });
    </script>
@endsection