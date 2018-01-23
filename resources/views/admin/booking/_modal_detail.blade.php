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
                                            $('#modal-calendar').modal('toggle');
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
                right: 'month,agendaWeek,agendaDay'
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
            selectable: true,
            selectHelper: true,
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
            eventRender: function (event, element, view) {
                element.find('div.fc-title').html(element.find('div.fc-title').text()) ;
                element.find('span.fc-title').html(element.find('span.fc-title').text()) ;
                element.find('span.fc-event-title').html(element.find('span.fc-event-title').text());
                if (view.name == 'listDay') {
                    element.find(".fc-list-item-time").parent().not(".scheduled-event").find(".fc-list-item-time").append("<div class='ibox-tools'><a style='background-color: transparent; margin-right: 10px' class='pull-right'><i class='fa fa-times closeon' style='color: red'></i></a></div>");
                } else {
                    element.find(".fc-content").parent().not(".scheduled-event").find(".fc-content").prepend("<div class='ibox-tools'><a style='background-color: transparent; margin-right: 10px' class='pull-right'><i class='fa fa-times closeon' style='color: red'></i></a></div>");
                }
                element.find(".closeon").on('click', function () {
                    $('#calendar').fullCalendar('removeEvents', event._id);

                });

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
            select: function (start, end, jsEvent, view) {
                if(view.name == "month"){
                    $('#calendar').fullCalendar('changeView', 'agendaDay'/* or 'basicDay' */);
                    $('#calendar').fullCalendar('gotoDate', start);
                }
                else {
                    var today = moment().format('YYYY-MM-DD HH:mm:ss'); // passing moment nothing defaults to today
                    var startSelection = start.format('YYYY-MM-DD HH:mm:ss');
                    if (startSelection < today) {
                        $('#calendar').fullCalendar('unselect');
                        alert('Waktu yang anda pilih telah berlalu!')
                    }
                    else {
                        var title = confirm('Apakah anda yakin ingin memilih waktu ini?');
                        var eventData;
                        var id = moment().unix();
                        if (title) {
                            eventData = {
                                id: id,
                                // color: '#24af90',
                                start: start,
                                end: end,
                                className: 'schedule-event',
                                description: 'Geser dan tarik untuk mengubah pilihan waktu jadwal!'
                            };
                            $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                        }
                        $('#calendar').fullCalendar('unselect');
                    }
                }

            },
            editable: true,
            slotLabelFormat: "HH:mm",
            eventLimit: true, // allow "more" link when too many events
            events: {!! $jadwal !!},
            eventOverlap: false,
            selectOverlap:false,
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