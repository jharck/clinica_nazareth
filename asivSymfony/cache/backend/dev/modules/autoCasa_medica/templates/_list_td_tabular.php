<td class="sf_admin_text sf_admin_list_td_id_casa_medica">
  <?php echo link_to($casa_medica->getIdCasaMedica(), 'casa_medica_edit', $casa_medica) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nombre">
  <?php echo $casa_medica->getNombre() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_nombre_contacto">
  <?php echo $casa_medica->getNombreContacto() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_telefono">
  <?php echo $casa_medica->getTelefono() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_fecha_contrato">
  <?php echo false !== strtotime($casa_medica->getFechaContrato()) ? format_date($casa_medica->getFechaContrato(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_status">
  <?php echo $casa_medica->getStatus() ?>
</td>
