var oMedicinaReceta = new Array();
var aComentario = new Array();
var oMedicineTable = {};
var oCommentTable = {};

$(document).ready(function() {
    $.ajax({
        url: $("#big_header").data('get_json_url'),
        type: 'post',
        dataType: 'json',
        data : {
            'pacient_id' : $("#big_header").data('pacient_id')
        },
        success: function (oData) {
            $('#chart_container').highcharts({
                title: {
                    text: 'Condicion Fisica del Paciente'
                },
                xAxis: {
                    categories: oData.line.cat
                },
                yAxis: {
                    title: {
                        text: 'Indicadores del Paciente'
                    }
                },
                series: [{
                    name: 'Peso (Libras)',
                    data: oData.line.weight
                }, {
                    name: 'Temp (°c)',
                    data: oData.line.temp
                }, {
                    name: 'Presion (Pa)',
                    data: oData.line.pre
                }, {
                    name: 'Altura (mts)',
                    data: oData.line.height
                }]
            });
            $('#bar_container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Medicamentos Recetados'
                },
                xAxis: {
                    type: 'category',
                    labels: {
                        rotation: -45,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad suministrada'
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    pointFormat: '<b>{point.y}</b>'
                },
                series: [{
                    name: 'Medicina',
                    data: 
                    oData.bar
                    ,
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        x: 4,
                        y: 10,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif',
                            textShadow: '0 0 3px black'
                        }
                    }
                }]
            });              
        }            
    });
    
    $("#comment_table").DataTable();
    oMedicineTable = $("#new_medicine_table").DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "filter" : false
    });
    oCommentTable = $("#new_comment_table").DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "filter" : false        
    });
    
    $("#add_comment_button").on('click', function(event) {
        aComentario.push($("#new_comment_cita").val());
        oCommentTable.row.add([$("#new_comment_cita").val()]).draw();
        $("#new_comment_cita").val("")
        return false;
    });
    
    $("#add_medicine_button").on('click', function(event) {
        var oRecord = {
            'id_medicina' : $("#new_medicina_id").val(),
            'medicina_text' : $("#new_medicina_id option:selected").text(),
            'indicacion' : $("#new_indicacion").val(),
            'cantidad' : $("#new_amount").val()
        };
        oMedicinaReceta.push(oRecord);
        oMedicineTable.row.add([oRecord.medicina_text, oRecord.cantidad, oRecord.indicacion]).draw();
        $("#clean_medicine_button").click();
        return false;
    }); 
    
    $("#send_medicine_and_quit").on('click', function(event) {
        var sUrl = $(this).data("action_url");
        $.ajax({
            url : sUrl,
            data: {
                'oRecetas' : oMedicinaReceta, 
                'aComment' : aComentario,
                'cita_id' : $("#big_header").data('cita_id'),
                'oCita' : {
                    'peso' : $("#new_peso_cita").val(),
                    'temp' : $("#new_temp_cita").val(),
                    'pres' : $("#new_presion_cita").val(),
                    'alto' : $("#new_alto_cita").val()
                }
            },
            dataType: 'json',
            type: 'post',
            success: function(oData) {
                if (oData.message_list.length == 0) {
                    jsUtil.Gritter.addSuccessMessage("Receta ha sido emitida Exitosamente!");
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
    });
});