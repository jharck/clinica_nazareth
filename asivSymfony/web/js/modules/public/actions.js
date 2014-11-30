$(document).ready(function() {
		
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next',
            center: 'title',
            right: 'agendaWeek'
        },
        defaultView: 'agendaWeek',
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        eventSources : [
            {
                url: $("#calendar").data("get_json_url"),
                type: 'POST',
                error: function() {
                  alert("Error al tratar de conseguir los horarios, intente otra vez");
                },
                color: 'brown',
                textColor: 'white'
            }
        ]
        
    });
		
});