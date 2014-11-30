<html lang = "en">
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
                    <a class="navbar-brand" href="dashborad.php">Panel de visitas</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active"><a href="#"><i class="fa fa-bullseye"></i>Horarios</a></li>
                    </ul>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div id='calendar'></div>
                    </div>
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