var iCurrentCitaId = null;
$(document).ready(function() {
    var table = $('#despacho_table').DataTable({
        "columnDefs": [
        {
            "visible": false, 
            "targets": 0
        }
        ],
        "order": [[ 0, 'asc' ]],
        "ordering": false,
        "info":     false,
        "filter" : false,
        "displayLength": 10,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {
                page:'current'
            } ).nodes();
            var last=null;
 
            api.column(0, {
                page:'current'
            } ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                        );
 
                    last = group;
                }
            } );
        }
    });
    $("#myModal").on("show.bs.modal", function(event) {
        $("#cantidad_donacion").val("");
    });
    
    $("#myModal").on("hidden.bs.modal", function(event) {
        iCurrentCitaId = null;
    });
    
    $(".donation_link").click(function(event) {
        event.preventDefault();
        iCurrentCitaId = $(this).data("cita_id");
        $("#myModal").modal('show');
    });    
    
    $("#save_donation_button").on('click', function(event) {
        var sUrl = $(this).data('url_action');
        if (iCurrentCitaId != null) {
            $.ajax({
                url: sUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    'cita_id' : iCurrentCitaId,
                    'monto' : $("#cantidad_donacion").val()
                },
                success: function(oData) {
                    if (oData.message_list.length == 0) {
                        jsUtil.Gritter.addSuccessMessage("Donacion Ingresada Correctamente!");
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    } else {
                        for (var i = 0; i <= oData.message_list.length; i++) {
                            jsUtil.Gritter.addErrorMessage(oData.message_list[i]);
                        }
                    }
                }
            });
        }
    });
});