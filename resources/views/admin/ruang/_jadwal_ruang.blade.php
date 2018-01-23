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
                //untuk baca <br/>
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
            slotLabelFormat: "HH:mm",
            eventLimit: true, // allow "more" link when too many events
            events: {!! $jadwal !!},
            eventOverlap: false,
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