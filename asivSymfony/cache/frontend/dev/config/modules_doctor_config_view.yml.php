<?php
// auto-generated by sfViewConfigHandler
// date: 2014/11/26 02:59:58
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Sistema de Control de Clinica', false, false);
  $response->addMeta('description', 'Sistema desarrollado para la materia de ASI2 UFG. 2014.', false, false);
  $response->addMeta('keywords', 'symfony, clinic, project', false, false);
  $response->addMeta('language', 'en', false, false);

  $response->addStylesheet('bootstrap.min.css', '', array ());
  $response->addStylesheet('plugins/metisMenu/metisMenu.min.css', '', array ());
  $response->addStylesheet('plugins/timeline.css', '', array ());
  $response->addStylesheet('sb-admin-2.css', '', array ());
  $response->addStylesheet('plugins/morris.css', '', array ());
  $response->addStylesheet('font-awesome-4.1.0/css/font-awesome.min.css', '', array ());
  $response->addStylesheet('jquery-ui.css', '', array ());
  $response->addStylesheet('jquery.gritter.css', '', array ());
  $response->addStylesheet('jquery.dataTables.css', '', array ());
  $response->addStylesheet('dataTables.bootstrap.css', '', array ());
  $response->addJavascript('jquery-1.11.0.js', '', array ());
  $response->addJavascript('bootstrap.min.js', '', array ());
  $response->addJavascript('plugins/metisMenu/metisMenu.min.js', '', array ());
  $response->addJavascript('sb-admin-2.js', '', array ());
  $response->addJavascript('jsUtils.js', '', array ());
  $response->addJavascript('jquery-ui.js', '', array ());
  $response->addJavascript('jquery.gritter.js', '', array ());
  $response->addJavascript('jquery.dataTables.js', '', array ());
  $response->addJavascript('dataTables.bootstrap.js', '', array ());


