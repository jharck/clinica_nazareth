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
                    <li class="active"><a href="#"><i class="fa fa-tasks"></i> Medicamentos</a></li>                    
                    <li><a href="proveedores.php"><i class="fa fa-globe"></i> Proveedores</a></li>
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
                    <h1>Inventario<small> Control de Inventario</small></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Control de Inventario</h3>
                        </div>
                        <div class="panel-body">
			  <table class="table ">
			    <thead>
			      <tr>
				<th>Medicamento</th>
				<th>Existencia</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr>
				<td>Acetaminofen</td>
				<td>
				  <div class="progress">
				    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" 
					aria-valuemin="0" aria-valuemax="100" style="width: 90%">100				      
				    </div>
				  </div>
				</td>
			      </tr>
			      <tr>
				<td>Dinitrato de isosorbide (Isordil)</td>
				<td>
				  <div class="progress">
				    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="80" 
					  aria-valuemin="0" aria-valuemax="100" style="width: 10%">2
				    </div>
				  </div>
				</td>
			      </tr>
			      <tr>
				<td>Bromhidrato de fenoterol y <br> el bromuro de ipratropio </td>
				<td>
				  <div class="progress">
				    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
				      15
				    </div>
				  </div>
				</td>
			      </tr>
			      <tr>
				<td>Entracitabinacon </td>
				<td>
				  <div class="progress">
				  <div class="progress">
				    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" 
					aria-valuemin="0" aria-valuemax="100" style="width: 99%">500
				    </div>
				  </div>
				  </div>
				</td>
			      </tr>			      
			      
			    </tbody>
			  </table>
			  <ul class="pagination">
			    <li><a href="#">&laquo;</a></li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li><a href="#">&raquo;</a></li>
			  </ul>
                        </div>
                    </div>
                </div>
		<div class="col-lg-12">
		<div class="panel panel-primary">
		  <div class="panel-heading">
		    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Formulario para agregar un medicamento al sistema</h3>
		  </div>
		  <div class="panel-body">
		  <form action="" method="post" class="form-signin">
		  <div class="control-group">
		    <label for="nombre_medicamento" class="control-label">Nombre de medicamento: <font color="red">*</font></label>
		    <div class="controls">
		      <input type="text" id="nombre_medicamento" name="nombre_medicamento" required autofocus>
		    </div>
		  </div>
		<div class="control-group">
		  <label for="cantidad" class="control-label">Cantidad: <font color="red">*</font></label>
		  <div class="controls">
		    <input type="text" id="cantidad" name="cantidad" required>
		  </div>
		</div>
		<div class="control-group">	
		    <label>Fecha de caducidad:</label>
		    <div class="control">
		      <input type="date" id="fecha" name="fecha" class="input-small"></input>
		    </div>
		</div>	
		<div class="control-group">
		  <label for="concentracion" class="control-label">Concentración: <font color="red">*</font></label>
		    <div class="controls">
		      <input type="text" id="concentracion" name="concentracion" required>
		    </div>
		</div>
		<div class="control-group">
			<label for="presentacion" class="control-label">Presentación: <font color="red">*</font></label>
			<div class="controls">
				<input type="text" id="presentacion" name="presentacion" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="submit" class="btn btn-primary" value="Agregar" /><br><br>
			</div>
		</div>
		</form>
		<label for="nota" class="control-label">NOTA: los datos marcados con (<font color="red">*</font>) deben ser rellenados obligatoriamente.</label>
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
