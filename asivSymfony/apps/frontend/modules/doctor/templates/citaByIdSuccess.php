<?php #$oCita = new Cita();         ?>
<?php use_javascript("highcharts.js"); ?>
<?php use_javascript("modules/doctor/actions.js"); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 id="big_header" class="page-header" data-cita_id="<?php echo $oCita->getIdCita(); ?>" data-pacient_id="<?php echo $oCita->getIdPaciente(); ?>" data-get_json_url="<?php echo url_for("doctor/getJsonChart"); ?>">
            Cuadro de paciente [<i><?php echo $oCita->getPaciente(); ?></i>]
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                Historial Clinico del Paciente
            </div>
            <div class="panel-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile_pacient" role="tab" data-toggle="tab">Perfil de Paciente</a></li>
                        <li role="presentation"><a href="#medical_history" role="tab" data-toggle="tab">Historico</a></li>
                        <li role="presentation"><a href="#charts" role="tab" data-toggle="tab">Tablero Grafico</a></li>
                        <li role="presentation" <?php echo $oCita->getIdEstadoCita() != '4' ? 'class="disabled"' : ''; ?>><a href="#receta" role="tab" data-toggle="tab">Cita Actual</a></li>                        
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile_pacient">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Informacion Personal del Paciente</h4>
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <th>Nombre</th><td><?php echo $oCita->getPaciente(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nombre de Usuario</th><td><?php echo $oCita->getPaciente()->getUsuario()->getUsername(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tipo Sanguineo</th><td><?php echo $oCita->getPaciente()->getTipoSanguineo(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Edad</th><td><?php echo $oCita->getPaciente()->getFechaNacimiento(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Correo Electronico</th><td><?php echo $oCita->getPaciente()->getUsuario()->getEmail(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Genero Sexual</th><td><?php echo $oCita->getPaciente()->getUsuario()->getGenero() == 1 ? 'Masculino' : 'Femenino'; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Ultimo Ingreso a la Aplicacion</th><td><?php echo $oCita->getPaciente()->getUsuario()->getUltimoIngreso(); ?></td>
                                            </tr>
                                            <tr>
                                                <th>Dias desde el Ultimo Ingreso</th><td><?php echo McCuboHelper::getDateDiff($oCita->getPaciente()->getUsuario()->getUltimoIngreso()); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>                                    
                                </div>
                                <div class="col-lg-6">
                                    <h4>Historial de Citas asistidas</h4>
                                    <table class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha de Cita</th><th>Duracion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($aCitaRecordList as $oCitaRecord): ?>
                                                <tr>
                                                    <td><?php echo "(" . $oCitaRecord->getInicioHoraCita() . ") " . date_format(date_create($oCitaRecord->getFechaCita()), "Y-M-d D"); ?></td>
                                                    <td>
                                                        <?php echo McCuboHelper::getMinutesDiff($oCitaRecord->getInicioHoraCita(), $oCitaRecord->getFinHoraCita()); ?>
                                                        Minutos
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="medical_history">
                            <div class="row">                                
                                <div class="col-lg-8">
                                    <h4>Historial Medico del Paciente</h4>
                                    <table id="comment_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Comentario</th><th>Creador del comentario</th><th>Fecha del Comentario</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $oCommentRecord = new CitaComentario(); ?>
                                            <?php foreach ($aCommentRecordList as $oCommentRecord): ?>
                                                <tr>
                                                    <td><?php echo $oCommentRecord->getComentario(); ?></td>
                                                    <td><strong><?php echo $oCommentRecord->getCita()->getEmpleado(); ?></strong></td>
                                                    <td><?php echo $oCommentRecord->getFechaComentario(); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-4">
                                    <h4>Historico de Medicinas</h4>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Medicina</th>
                                                <th>Cantidad</th>
                                                <th>Fecha Recetada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $oRecetaCita = new RecetaCita(); ?>
                                            <?php foreach ($aRecetaCitaRecordList as $oRecetaCita): ?>
                                                <tr>
                                                    <td><?php echo $oRecetaCita->getMedicina(); ?></td>
                                                    <td><?php echo $oRecetaCita->getCantidad(); ?> Unidades</td>
                                                    <td><?php echo $oRecetaCita->getCita()->getFechaCita(); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="charts">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div id="chart_container"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div id="bar_container"></div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="receta">
                            <?php if ($oCita->getIdEstadoCita() != '4'): ?>
                                <div class="alert alert-warning" role="alert">
                                    <h4>Esta informacion solamente puede ser editada cuando el paciente esta en Consulta</h4>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <br />
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Recetar Medicina
                                                    </div>
                                                    <div class="panel-body">
                                                        <form id="add_medicine_form" role="form">
                                                            <div class="form-group">
                                                                <label>Medicina</label>
                                                                <div class="controls">
                                                                    <select id="new_medicina_id" style="max-width: 168px;">
                                                                        <option value="" disabled selected>Seleccione una Medicina a recetar</option>
                                                                        <?php foreach ($aMedicineRecordList as $oMedicina): ?>
                                                                            <option value="<?php echo $oMedicina->getIdMedicina(); ?>"><?php echo $oMedicina; ?></option>
                                                                        <?php endforeach; ?>
                                                                    </select>                                                            
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Indicaciones</label>
                                                                <div class="controls">
                                                                    <textarea id="new_indicacion" cols="38" rows="7"></textarea>
                                                                </div>                                                        
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Cantidad</label>
                                                                <div class="controls">
                                                                    <input type="number" id="new_amount" />
                                                                </div>                                                        
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <button id="add_medicine_button" class="btn btn-primary">Agregar a Receta</button>
                                                                    <button id="clean_medicine_button" type="reset" class="btn btn-default">Limpiar</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Comentarios de la Cita
                                                    </div>
                                                    <div class="panel-body">
                                                        <form role="form">
                                                            <div class="form-group">
                                                                <label>Comentario</label>
                                                                <textarea id="new_comment_cita" cols="38" rows="7"></textarea>
                                                            </div>
                                                            <button id="add_comment_button" class="btn btn-default">Agregar Comentario</button>
                                                        </form>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Medidas Necesarias para la Consulta
                                                    </div>
                                                    <div class="panel-body">
                                                        <form role="form">
                                                            <div class="form-group">
                                                                <label>Peso <small>(Libras)</small></label>
                                                                <input type="text" class="form-control" id="new_peso_cita" placeholder="Ingrese el peso en Libras">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Temperatura<small>(Grados centigrados)</small></label>
                                                                <input type="text" class="form-control" id="new_temp_cita" placeholder="Ingrese la temperatura en grados Celcius">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Presion <small>(mm de Mercurio)</small></label>
                                                                <input type="text" class="form-control" id="new_presion_cita" placeholder="Ingrese la presion en mm de Hg">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Altura <small>(Centimetros)</small></label>
                                                                <input type="text" class="form-control" id="new_alto_cita" placeholder="Ingrese la altura en centimetros">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Medicina Recetada
                                                    </div>
                                                    <div class="panel-body">
                                                        <table id="new_medicine_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Medicina</th><th>Cantidad</th><th>Indicaciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        Comentarios Agregados
                                                    </div>
                                                    <div class="panel-body">
                                                        <table id="new_comment_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Comentario</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <button id="send_medicine_and_quit" class="btn btn-primary" data-action_url="<?php echo url_for("doctor/saveAndEnd"); ?>">
                                            Emitir Receta y Terminar Cita
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="new_cita">
                            <?php if ($oCita->getIdEstadoCita() == '4' || $oCita->getIdEstadoCita() == '5'): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <fieldset><legend>Programar proxima cita</legend>
                                            <div class="alert alert-success" role="alert">...</div>
                                        </fieldset>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-warning" role="alert">
                                    <h4>Esta informacion solamente puede ser editada cuando el paciente esta en Consulta</h4>
                                </div>
                            <?php endif; ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
