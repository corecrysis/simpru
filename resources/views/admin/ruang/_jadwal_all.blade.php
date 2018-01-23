@section('calendar')
    <div id="calendar">

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
//            footer: {
//                center: 'myCustomButton'
//            },
            locale: 'id',
            navLinks: true, // can click day/week names to navigate views
            defaultView: 'month',
//            validRange: {
//                start: moment().format('YYYY-MM-DD')
//            },
            handleWindowResize: true,
            windowResize: function (view) {
                $("#calendar").fullCalendar('option', 'height', 'parent');
                $("#calendar").fullCalendar('render');
            },
            allDaySlot: false,
//            viewRender: function (view) {
//                if (view.start.format('YYYY-MM-DD') <= moment().format('YYYY-MM-DD')) {
//
//                    $(".fc-prev-button").prop('disabled', true);
//                    $(".fc-prev-button").addClass('fc-state-disabled');
//                }
//                else {
//                    $(".fc-prev-button").removeClass('fc-state-disabled');
//                    $(".fc-prev-button").prop('disabled', false);
//                }
//
//            },
//
            eventRender: function (event, element, view) {
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
            slotLabelFormat: "HH:mm",
            eventLimit: true, // allow "more" link when too many events
            events: {!! $jadwal !!},
            eventOverlap: true,
        });
    </script>
@endsection