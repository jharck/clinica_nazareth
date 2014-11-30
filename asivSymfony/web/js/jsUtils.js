var jsUtil = jsUtil || {};
jsUtil.Gritter = jsUtil.Gritter || {};

//#############################
//Gritter Helper functions
//#############################
jsUtil.Gritter.addSuccessMessage = function(sMessage) {
    $.gritter.add({
        title: 'Exito!',
        text: sMessage,
        image: '../images/success.png'
    });
}
jsUtil.Gritter.addErrorMessage = function(sMessage) {
    $.gritter.add({
        title: 'Un Error ha ocurrido',
        text: sMessage,
        image: '../images/error.png'
    });
}