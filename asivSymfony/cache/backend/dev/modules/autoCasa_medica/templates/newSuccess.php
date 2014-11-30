<?php use_helper('I18N', 'Date') ?>
<?php include_partial('casa_medica/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Casa medica', array(), 'messages') ?></h1>

  <?php include_partial('casa_medica/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('casa_medica/form_header', array('casa_medica' => $casa_medica, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('casa_medica/form', array('casa_medica' => $casa_medica, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('casa_medica/form_footer', array('casa_medica' => $casa_medica, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
