<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Ingrese sus Credenciales</h3>
            </div>
            <div class="panel-body">
                <form id="login_form" data-action_url="<?php echo url_for("login/doLogin"); ?>" data-success_url="<?php echo url_for("welcome/index"); ?>" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input id="username" class="form-control" placeholder="Email o Usuario" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input id="password" class="form-control" placeholder="Password" type="password" value="">
                        </div>
                        <div class="form-group">
                            <button type="button" id="login" class="btn btn-outline btn-success">
                                <span class="glyphicon glyphicon-user"></span> Ingresar
                            </button>
                            <button type="reset" class="btn btn-outline btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Cancelar
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline btn-warning dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-question-sign"></span> Ayuda <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Recuperar Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo url_for("public/index") ?>">Consulta de horarios</a></li>
                                </ul>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#login").click(function(event) {
            var oLogin = {
                username : $("#username").val(),
                passwd : $("#password").val()
            };
            $.ajax({
                url: $("#login_form").data('action_url'),
                data: oLogin,
                dataType: 'json',
                success: function(oData, textStatus, jqXHR) {
                    console.log(textStatus);
                    console.log(oData);
                    if (oData.message_list.length > 0) {
                        for (var i = 0; i < oData.message_list.length; i++) {
                            jsUtil.Gritter.addErrorMessage(oData.message_list[i]);
                        }
                    } else {
                        window.location.replace($("#login_form").data('success_url'));
                    }
                },
                type: 'post'
            });
            event.preventDefault();
        });
    });
</script>