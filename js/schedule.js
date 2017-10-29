var schedule = function () {

    return {

        //main function to initiate the module
        init: function () {
            
           

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd = '0'+dd
            } 

            if(mm<10) {
                mm = '0'+mm
            } 

            today = yyyy + '-' + mm + '-' + dd;
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                defaultView: 'agendaDay',
                defaultDate: today,
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                events: {
                    url: '../json/schedulesJson.php',
                    error: function() {
                        $('#script-warning').show();
                    }
                },
                 eventRender: function(event, element) {
                    element.attr('title', event.tip);
                },
                 select: function(start, end, jsEvent, view) {
                     // start contains the date you have selected
                     // end contains the end date. 
                     // Caution: the end date is exclusive (new since v2).
                     
                     var allDay = !start.hasTime && !end.hasTime;
                     alert(["Event Start date: " + moment(start).format(),
                            "Event End date: " + moment(end).format(),
                            "AllDay: " + allDay].join("\n"));
                }
            });

            $('#calendar button').on('click', function (e) {
                e.preventDefault();
                //alert($('.fc-day-header span').text())
            });
            
           
        }

    };

}();