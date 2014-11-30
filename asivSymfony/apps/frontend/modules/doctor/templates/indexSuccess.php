<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tablero del Doctor</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Citas programadas para el dia actual (<?php echo date("Y-m-d"); ?>)
            </div>
            <div class="panel-body">
                <table id="citas_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Paciente</th><th>Hora Inicio</th><th>Estado Cita</th><th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $oCita = new Cita(); ?>
                        <?php foreach ($aCita as $oCita): ?>
                            <tr>
                                <td><?php echo $oCita->getPaciente(); ?></td>
                                <td><?php echo $oCita->getInicioHoraCita(); ?></td>
                                <td><?php echo $oCita->getEstadoCita(); ?></td>
                                <td>
                                    <a href="<?php echo url_for1("doctor/citaById?id={$oCita->getIdCita()}")  ?>">
                                        <img src="<?php echo image_path("edito.png"); ?>" />
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#citas_table").dataTable();
    });
</script>