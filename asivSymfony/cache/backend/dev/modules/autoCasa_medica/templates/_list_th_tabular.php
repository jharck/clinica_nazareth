<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_id_casa_medica">
  <?php if ('id_casa_medica' == $sort[0]): ?>
    <?php echo link_to(__('Id casa medica', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=id_casa_medica&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Id casa medica', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=id_casa_medica&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nombre">
  <?php if ('nombre' == $sort[0]): ?>
    <?php echo link_to(__('Nombre', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=nombre&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nombre', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=nombre&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_nombre_contacto">
  <?php if ('nombre_contacto' == $sort[0]): ?>
    <?php echo link_to(__('Nombre contacto', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=nombre_contacto&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Nombre contacto', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=nombre_contacto&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_telefono">
  <?php if ('telefono' == $sort[0]): ?>
    <?php echo link_to(__('Telefono', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=telefono&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Telefono', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=telefono&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_date sf_admin_list_th_fecha_contrato">
  <?php if ('fecha_contrato' == $sort[0]): ?>
    <?php echo link_to(__('Fecha contrato', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=fecha_contrato&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Fecha contrato', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=fecha_contrato&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_status">
  <?php if ('status' == $sort[0]): ?>
    <?php echo link_to(__('Status', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=status&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
    <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php echo link_to(__('Status', array(), 'messages'), '@casa_medica', array('query_string' => 'sort=status&sort_type=asc')) ?>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>