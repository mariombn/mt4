<?php

// Definição das Constantes

define('SYSTEM_PATH', __DIR__);
define('PUBLIC_SYSTEM_PATH', SYSTEM_PATH . '/public');

spl_autoload_register(function($classe){
    $classe = 'src/' . str_replace('\\', '/', $classe) . '.php';
    require_once $classe;
});