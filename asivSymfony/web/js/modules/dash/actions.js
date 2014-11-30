var iCurrentDialogId = null;
$(document).ready(function() {
    $("#new_date_meeting").datepicker({
        minDate: 0, 
        maxDate: "+1M +10D",
        showOn: "button",
        buttonText: "...",
        dateFormat: "yy-mm-dd"
    });
    
    $(".reschedule_meeting").click(function(event) {
        event.preventDefault();
        iCurrentDialogId = $(this).data("meeting_id");
        $("#reschedule_meeting_modal").modal('show');
    });
    
    $("#reschedule_meeting_modal").on("show.bs.modal", function(event) {
        $("#new_date_meeting").val("");
        $("#new_time_meeting").val("");
    });
    
    $("#reschedule_meeting_modal").on("hidden.bs.modal", function(event) {
        iCurrentDialogId = null;
    });
    
    // Update related shits goes here! :D
    $("#update_meeting_modal").on("hidden.bs.modal", function(event) {
        iCurrentDialogId = null;
    });
    
    $(".update_meeting").click(function(event) {
        event.preventDefault();
        iCurrentDialogId = $(this).data("meeting_id");
        $("#update_meeting_modal").modal("show");
    });
    $("#update_meeting_button").click(function(event) {
        event.preventDefault();
        var sUrl = $(this).data("url_action");
        if (null != iCurrentDialogId) {
            $.ajax({
                url: sUrl,
                dataType: 'json',
                type: 'post',
                data : {
                    id : iCurrentDialogId
                }, 
                success: function(oData) {
                    if (oData.message_list.length == 0) {
                        jsUtil.Gritter.addSuccessMessage("La cita ha sido actualizada correctamente");
                        $("#update_meeting_modal").modal('hide');
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
    
    //  CANCEL related shits
    $("#cancel_meeting_modal").on("hidden.bs.modal", function(event) {
        iCurrentDialogId = null;
    });
    
    $(".cancel_meeting").click(function(event) {
        event.preventDefault();
        iCurrentDialogId = $(this).data("meeting_id");
        $("#cancel_meeting_modal").modal('show');
    });

    $("#cancel_meeting_button").click(function(event) {
        var sUrl = $(this).data("url_action");
        event.preventDefault();
        if (null != iCurrentDialogId) {
            $.ajax({
                url: sUrl,
                dataType: 'json',
                type: 'post',
                data: {
                    id : iCurrentDialogId
                },
                success: function(oData) {
                    if (oData.message_list.length == 0) {
                        jsUtil.Gritter.addSuccessMessage("La cita ha sido actualizada correctamente");
                        $("#cancel_meeting_modal").modal('hide');
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
        } else {
            jsUtil.Gritter.addErrorMessage("Trate seleccionando nuevamente la cita");
        }
    });
});