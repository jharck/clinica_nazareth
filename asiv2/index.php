<html lang="en"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Sistema de Control de Clinica</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/jquery.gritter.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/cover.css" rel="stylesheet">
        <style id="holderjs-style" type="text/css"></style>
    </head>

    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="cover-container">
                    <div class="masthead clearfix">
                        <div class="inner">
                            <h3 class="masthead-brand">Clinica Nazareth</h3>
                            <ul class="nav masthead-nav">
                                <li class="active"><a href="#">Login</a></li>
                                <li><a href="schedules.php">Horarios</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="inner cover">
                        <h1 class="cover-heading">Ingrese sus credenciales</h1>
                        <form class="form-signin" role="form" id="login_form">
                            <input id="username" type="text" class="form-control" placeholder="Nombre de usuario" required="" autofocus="">
                            <br />
                            <input id="userpass" type="password" class="form-control" placeholder="Password" required="">
                            <br />
                            <button id="do_login" class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>                          
                        </form>
                        <p class="lead">
                            <a>Olvido la Contra&ntilde;a</a> | <a>Registrarme</a>
                        </p>
                        <div class="mastfoot">
                            <div class="inner">
                                .....
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="js/jquery.gritter.min.js"></script>
            <script src="js/validate.js"></script>
    </body>
    <script>
        $(document).ready(function() {
            $("#do_login").click(function() {
                if ($("#login_form").valid()) {
                    var oForm = {
                        username: $("#username").val(),
                        userpass: $("#userpass").val()
                    };
                    $.ajax({
                        url: './login_controller/do_login.php',
                        data: oForm,
                        dataType: 'json',
                        success: function(oData, sStatus, oJqXHR) {
                            console.log(oData);
                            if (oData.message_list.length === 0) {
                                window.location.replace("dashborad.php");
                            } else {
                                for (var i = 0; i < oData.message_list.length; i++) {
                                    $.gritter.add({
                                        title: 'Error!!',
                                        text: oData.message_list[i],
                                        image: 'https://cdn1.iconfinder.com/data/icons/3d-printing-icon-set/32/Error.png',
                                    });
                                }
                            }
                        }
                    });
                } else {

                }
                return false;
            });
        });
    </script>
</html>