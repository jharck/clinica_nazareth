<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
        <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Sistema de Control de Clinica</title>

        <link rel = "stylesheet" type = "text/css" href = "bootstrap/css/bootstrap.min.css">
        <link rel = "stylesheet" type = "text/css" href = "font-awesome/css/font-awesome.min.css">
        <link rel = "stylesheet" type = "text/css" href = "css/local.css">

        <script type = "text/javascript" src = "js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <link href="css/fullcalendar.css" rel="stylesheet" />
        <link href="css/fullcalendar.print.css" rel="stylesheet" media="print" />
        <script src="js/moment.min.js"></script>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/fullcalendar.min.js"></script>
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
                    <a class="navbar-brand" href="dashborad.php">Panel Administrativo</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="dashborad.php"><i class="fa fa-bullseye"></i> Inicio</a></li>
                        <li><a href="medicamentos.php"><i class="fa fa-tasks"></i> Medicamentos</a></li>                    
                        <li><a href="proveedores.php"><i class="fa fa-globe"></i> Proveedores</a></li>
                        <li><a href="pacientes.php"><i class="fa fa-list-ol"></i> Nuevos Pacientes</a></li>
                        <li><a href="empleados.php"><i class="fa fa-list-ul"></i> Empleados</a></li>
                        <li class="active"><a href="schedules_admin.php"><i class="fa fa-list-ul"></i> Horarios</a></li>
                        <li><a href="new_meeting.php"><i class="fa fa-list-ul"></i> Crear Cita</a></li>
                        <li><a href="reception_list.php"><i class="fa fa-list-ul"></i> Lista de Espera (Pacientes)</a></li>
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
                    <div class="col-lg-12">
                        <div id='calendar'></div>
                    </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->
        </div>
    </body>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                defaultDate: '2014-09-12',
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    {
                        title: 'Ocupado',
                        start: '2014-09-09T16:30:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2014-09-09T16:00:00'
                    },
                    {
                        title: 'Conferencia',
                        start: '2014-09-11',
                        end: '2014-09-13'
                    },
                    {
                        title: 'No disponible',
                        start: '2014-09-13T08:00:00',
                        end: '2014-09-14T18:30:00'
                    },
                    {
                        title: 'Reservado',
                        start: '2014-09-12T10:30:00',
                        end: '2014-09-12T12:30:00'
                    },
                    {
                        title: 'Almuerzo',
                        start: '2014-09-12T12:00:00'
                    },
                    {
                        title: 'Reunion',
                        start: '2014-09-12T14:30:00'
                    },
                    {
                        title: 'Reservado',
                        start: '2014-09-12T17:30:00'
                    },
                    {
                        title: 'Reservado',
                        start: '2014-09-11T08:00:00'
                    },
                    {
                        title: 'Reservado',
                        start: '2014-09-11T15:00:00'
                    },
                    {
                        title: 'Reservado',
                        start: '2014-09-11T15:30:00'
                    },
                    {
                        title: 'Reservado',
                        start: '2014-09-11T15:50:00'
                    },
                    {
                        title: 'Reservado',
                        start: '2014-09-10T15:50:00'
                    }
                ]
            });
        });
    </script>
</html>
