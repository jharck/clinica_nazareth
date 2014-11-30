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

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/shieldui-all.min.css" />
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
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
                    <li class="active"><a href="proveedores.php"><i class="fa fa-globe"></i> Proveedores</a></li>
                    <li><a href="pacientes.php"><i class="fa fa-list-ol"></i> Nuevos Pacientes</a></li>
                    <li><a href="empleados.php"><i class="fa fa-list-ul"></i> Empleados</a></li>
                    <li><a href="schedules_admin.php"><i class="fa fa-list-ul"></i> Horarios</a></li>
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
            <div class="row">
                <div class="col-lg-12">
                    <h1>Proveedores<small> Formulario para agregar un proveedor al sistema</small></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Proveedores</h3>
                        </div>
                        <div class="panel-body">
<form action="" method="post" class="form-signin">
					<div class="control-group">
						<label for="nombre_empresa" class="control-label">Nombre de empresa: <font color="red">*</font></label>
						<div class="controls">
							<input type="text" id="nombre_empresa" name="nombre_empresa" required="" autofocus="">
						</div>
					</div>
					<div class="control-group">
						<label for="nombre_contacto" class="control-label">Nombre de contacto: <font color="red">*</font></label>
						<div class="controls">
							<input type="text" id="nombre_contacto" name="nombre_contacto" required="">
						</div>
					</div>	
					<div class="control-group">
						<label for="cargo" class="control-label">Cargo en la empresa: <font color="red">*</font></label>
						<div class="controls">
							<input type="text" id="cargo" name="cargo" required="">
						</div>
					</div>
					<div class="control-group">
						<label for="direccion" class="control-label">Dirección: <font color="red">*</font></label>
						<div class="controls">
							<textarea class="form-control" name="direccion" required=""></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="pais" class="control-label">Pais: <font color="red">*</font></label>
						<div class="controls">
							<input type="text" id="pais" name="pais" required="">
						</div>
					</div>
					<div class="control-group">
						<label for="ciudad" class="control-label">Ciudad: <font color="red">*</font></label>
						<div class="controls">
							<input type="text" id="ciudad" name="ciudad" required="">
						</div>
					</div>
					<div class="control-group">
						<label for="telefono" class="control-label">Teléfono: <font color="red">*</font></label>
						<div class="controls">
							<input type="text" id="telefono" name="telefono" required="">
						</div>
					</div>
					<div class="control-group">
						<label for="fax" class="control-label">Fax: <font color="red">*</font></label>
						<div class="controls">
							<input type="text" id="fax" name="fax" required="">
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<input type="submit" class="btn btn-primary" value="Agregar"><br><br>
						</div>
					</div>
			</form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
</body>
</html>
