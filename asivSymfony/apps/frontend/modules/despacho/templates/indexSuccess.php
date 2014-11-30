<?php use_javascript("modules/despacho/actions.js"); ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Despacho de Medicina</h1>
    </div>
    <table id="despacho_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>key</th><td>Medicamento</td><th>Cantidad</th><th>Indicaciones de Uso</th>
            </tr>
        </thead>
        <tbody>
            <?php $oRecetaCitaRecord = new RecetaCita(); ?>
            <?php foreach ($oRecetaCitaRecordList as $oRecetaCitaRecord): ?>
                <tr>
                    <td>
                        <a data-cita_id="<?php echo $oRecetaCitaRecord->getIdCita(); ?>" href="#" class="donation_link">
                            <?php echo "Fecha de Cita: " . $oRecetaCitaRecord->getCita()->getFechaCita() . " " . $oRecetaCitaRecord->getCita()->getInicioHoraCita() . " - Paciente: " . $oRecetaCitaRecord->getCita()->getPaciente() ?>
                        </a>
                    </td>
                    <td><?php echo $oRecetaCitaRecord->getMedicina(); ?></td>
                    <td><?php echo $oRecetaCitaRecord->getCantidad(); ?> Unidades</td>                    
                    <td><?php echo $oRecetaCitaRecord->getRecetaIndicacion(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h6 class="modal-title" id="myModalLabel">Donacion voluntaria por medicamentos/cita</h6>
            </div>
            <div class="modal-body">
                <form role="form" id="form_reschedule_meeting">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-user"></span>
                        <label>Cantidad a Donar</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input id="cantidad_donacion" type="text" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="save_donation_button" data-url_action="<?php echo url_for("despacho/saveDonation"); ?>">
                    Guardar Cambios
                </button>
            </div>
        </div>
    </div>
</div>