<?php

// Definição das Constantes

class ConfigProvider
{

}


spl_autoload_register(function($classe){
    $classe = 'src/' . str_replace('\\', '/', $classe) . '.php';
    require_once $classe;
});