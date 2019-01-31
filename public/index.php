<?php

require_once '../bootstrap.php';

$view = \Service\ViewServiceFactory::create();

$view->header();

?>

<h1>Página Inicial</h1>

<p>Selecione um dos Menus</p>

<?php $view->footer() ?>