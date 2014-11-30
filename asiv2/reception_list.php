<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Control de Clinica</title>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="css/local.css" />

        <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Panel Administrativo</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="#"><i class="fa fa-bullseye"></i> Inicio</a></li>
                        <li><a href="medicamentos.php"><i class="fa fa-tasks"></i> Medicamentos</a></li>                    
                        <li><a href="proveedores.php"><i class="fa fa-globe"></i> Proveedores</a></li>
                        <li><a href="pacientes.php"><i class="fa fa-list-ol"></i> Nuevos Pacientes</a></li>
                        <li><a href="empleados.php"><i class="fa fa-list-ul"></i> Empleados</a></li>
                        <li><a href="schedules_admin.php"><i class="fa fa-list-ul"></i> Horarios</a></li>
                        <li><a href="new_meeting.php"><i class="fa fa-list-ul"></i> Crear Cita</a></li>
                        <li class="active"><a href="reception_list.php.php"><i class="fa fa-list-ul"></i> Lista de Reception (hoy)</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown messages-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Notificaciones <span class="badge">1</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">1 Nueva(s) Notificacion(es)</li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><i class="fa fa-bell"></i></span>
                                        <span class="message">Proxima cita 10:30 a.m.</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                                <li><a href="#"><i class="fa fa-gear"></i> Configuracion</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Salir del Sistema</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Citas <small>Lista de citas para la fecha: <?php echo date("Y-m-d"); ?></small></h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Listado de citas</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th>Paciente</th>
                                                <th>Hora programada</th>
                                                <th>Accion sobre la cita</th>
                                                <th>Doctor en cargo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Gregorio Emmanuel</td>
                                                <td>10:30 a.m. <img src="images/clock.png" /></td>
                                                <td>
                                                    <a style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                                        <img src="images/list.png" />
                                                    </a>
                                                </td>
                                                <td>Doctor #1</td>
                                            </tr>
                                            <tr>
                                                <td>Leonardo diNatale</td>
                                                <td>10:30 a.m. <img src="images/clock.png" /></td>
                                                <td>
                                                    <a style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                                        <img src="images/list.png" />
                                                    </a>
                                                </td>
                                                <td>Doctor #2</td>
                                            </tr>
                                            <tr>
                                                <td>Dmitry Iosifovich Ivanovsky</td>
                                                <td>11:00 a.m. <img src="images/clock.png" /></td>
                                                <td>
                                                    <a style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                                        <img src="images/list.png" />
                                                    </a>
                                                </td>
                                                <td>Doctor #1</td>
                                            </tr>
                                            <tr>
                                                <td>Vladimir Vladimirovich</td>
                                                <td>11:30 a.m. <img src="images/clock.png" /></td>
                                                <td>
                                                    <a style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                                                        <img src="images/list.png" />
                                                    </a>
                                                </td>
                                                <td>Doctor #1</td>
                                            </tr>                                            
                                        </tbody>
                                    </table>
                                    <ul class="pagination">
                                        <li><a href="#">«</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <!-- /.row -->
                </div>
                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Editar Informacion de la Cita</h4>
                        </div>
                        <div class="modal-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#home" role="tab" data-toggle="tab">Principal</a></li>
                                <li><a href="#profile" role="tab" data-toggle="tab">Razon de cancelar</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <form role="form">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hora de la cita</label>
                                            <input class="form-control" type="time" disabled="disabled" value="10:30" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hora a la que se present&oacute;</label>
                                            <input class="form-control" type="time" disabled="disabled" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Estado de la cita</label>
                                            <div class="radio">
                                                <label><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Asistio</label>
                                            </div>
                                            <div class="radio">
                                                <label><input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">Cancelo a ultimo minuto</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="profile">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Razon</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha reprogramacion de Cita</label>
                                            <input type="date" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Hora</label>
                                            <input type="time" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Doctor para la cita</label>
                                            <select class="form-control">
                                                <option>addison montgomery</option>
                                                <option>jordania cavanaugh</option>
                                                <option>macarena wilson</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
