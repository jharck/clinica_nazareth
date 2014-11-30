<?php use_javascript("modules/dash/actions.js"); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tablero administrador de citas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-question fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $iPendingMeetingCount; ?></div>
                        <div>Pendiente confirmacion del paciente</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $iConfirmedMeetingCount; ?></div>
                        <div>Total Citas Confirmadas!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-sign-out fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $iCanceledMeetingCount; ?></div>
                        <div>Citas canceladas para el dia de hoy!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-clock-o fa-fw"></i> Citas (por orden de llegada)
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="timeline">
                    <?php $iOddEvenFlag = 1; ?>
                    <?php $oCita = new Cita(); ?>
                    <?php foreach ($aMeetingList as $oCita) : ?>
                        <li class="<?php echo $iOddEvenFlag % 2 == 0 ? "timeline-inverted" : ""; ?>">
                            <div class="timeline-badge"><i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Hora: <?php echo $oCita->getInicioHoraCita(); ?></h4>
                                    <?php if ($oCita->getIdEstadoCita() == 3) : ?>
                                        <span class="label label-success">confirmada</span>
                                    <?php elseif ($oCita->getIdEstadoCita() == 1) : ?>
                                        <span class="label label-info">pendiente confirmacion</span>
                                    <?php elseif ($oCita->getIdEstadoCita() == 4) : ?>
                                        <span class="label label-warning">En Consulta</span>
                                    <?php else : ?>
                                        <span class="label label-danger">cancelada</span>
                                    <?php endif; ?>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-clock-o"></i> Reservada hace: <?php echo McCuboHelper::getDateDiff($oCita->getFechaCreacion()); ?></small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p><strong>Paciente:</strong> <?php echo $oCita->getPaciente(); ?></p>
                                    <p><strong>Medico:</strong> <?php echo $oCita->getEmpleado(); ?></p>
                                    <p><strong>Duracion aprox.:</strong> <?php echo McCuboHelper::getMinutesDiff($oCita->getInicioHoraCita(), $oCita->getFinHoraCita()); ?> minutos</p>
                                    <?php if ($oCita->getIdEstadoCita() != 4) : ?>
                                        <hr />
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-gear"></i>  <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#" class="reschedule_meeting" data-meeting_id="<?php echo $oCita->getIdCita(); ?>">Re-Agendar</a></li>
                                                <?php if ($oCita->getIdEstadoCita() != 2) : ?>
                                                    <?php if ($oCita->getIdEstadoCita() == 3) : ?>
                                                        <li><a href="#" class="update_meeting" data-meeting_id="<?php echo $oCita->getIdCita(); ?>">Pasar a Consulta</a></li>
                                                    <?php endif; ?>
                                                    <li class="divider"></li>
                                                    <li><a href="#" class="cancel_meeting" data-meeting_id="<?php echo $oCita->getIdCita(); ?>">Cancelar</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div> 
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>                    
                        <?php $iOddEvenFlag++; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <!-- /.panel -->
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-comments fa-fw"></i>
                Chat                
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="chat">
                    <li class="right clearfix">
                        <span class="chat-img pull-right">
                            <img src="https://lh5.googleusercontent.com/-7-4H9S6jylA/AAAAAAAAAAI/AAAAAAAAAM4/_mzN74xkvFA/s46-c-k-no/photo.jpg" alt="User Avatar" class="img-circle" />
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <small class=" text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                <strong class="pull-right primary-font">RaelNegas</strong>
                            </div>
                            <p>
                                Hola, buenos dias, tengo una consulta!
                            </p>
                        </div>
                    </li>
                    <li class="left clearfix">
                        <span class="chat-img pull-left">
                            <img src="https://lh5.googleusercontent.com/-SB8Urs0fj1E/AAAAAAAAAAI/AAAAAAAABn0/TGGxnUYlQWs/s46-c-k-no/photo.jpg" alt="User Avatar" class="img-circle" />
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font"><?php echo $sf_user->getAttribute("full_name"); ?></strong> 
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                            </div>
                            <p>
                                Buenos dias, en que puedo ayudarle?
                            </p>
                        </div>
                    </li>                    
                    <li class="right clearfix">
                        <span class="chat-img pull-right">
                            <img src="https://lh5.googleusercontent.com/-7-4H9S6jylA/AAAAAAAAAAI/AAAAAAAAAM4/_mzN74xkvFA/s46-c-k-no/photo.jpg" alt="User Avatar" class="img-circle" />
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <small class=" text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                <strong class="pull-right primary-font">RaelNegas</strong>
                            </div>
                            <p>
                                tengo una consulta sobre atencion el dia sabado
                            </p>
                        </div>
                    </li>
                    <li class="left clearfix">
                        <span class="chat-img pull-left">
                            <img src="https://lh5.googleusercontent.com/-SB8Urs0fj1E/AAAAAAAAAAI/AAAAAAAABn0/TGGxnUYlQWs/s46-c-k-no/photo.jpg" alt="User Avatar" class="img-circle" />
                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font"><?php echo $sf_user->getAttribute("full_name"); ?></strong> 
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                </small>
                            </div>
                            <p>
                                Ok, en la pagina principal, existe un enlace en el cual se encuentran disponibles todos los horarios
                                de los medicos que laboran en nuestra clinica
                            </p>
                        </div>
                    </li>                    
                </ul>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Escriba su mensaje aca!..." />
                    <span class="input-group-btn">
                        <button class="btn btn-warning btn-sm" id="btn-chat">Enviar!</button>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->
<!-- Modal Area -->
<div class="modal fade bs-example-modal-sm" id="reschedule_meeting_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Reprogramar cita</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form_reschedule_meeting">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <label>Nueva fecha de cita</label>
                        <input type="text" id="new_date_meeting" disabled>
                    </div>
                    <div class="form-group">
                        <span class="glyphicon glyphicon-time"></span>
                        <label>Nueva hora de cita</label><br />
                        <input type="time" id="new_time_meeting" style="height: 23px;">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="cancel_meeting_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Cancelar Cita</h4>
            </div>
            <div class="modal-body">                
                <strong>Esta seguro que desea cancelar la cita Seleccionada?</strong>
                <p>si la cita es cancelada, se notificara al paciente por medio de correo electronico</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir sin guardar</button>
                <button type="button" class="btn btn-danger" id="cancel_meeting_button" data-url_action="<?php echo url_for("dash/cancelMeeting"); ?>">Si, Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-sm" id="update_meeting_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Pasar a consulta</h4>
            </div>
            <div class="modal-body">
                <p><strong>Esta seguro que desea pasar este paciente a consulta con el medico?</strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="update_meeting_button" data-url_action="<?php echo url_for("dash/updateMeeting"); ?>" type="button" class="btn btn-danger">Si, Pasar</button>
            </div>
        </div>
    </div>
</div>

<!-- /Modal Area -->