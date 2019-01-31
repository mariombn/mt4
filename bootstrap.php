<?php

/**
 * MT4 - Aplicação WeB de Segurança
 * Autor: Mario de Moraes Barros Neto <mariombn@gmail.com>
 * Github: https://github.com/mariombn/mt4
 */

// Definição das Constantes de Diretórios
define('SYSTEM_PATH', __DIR__);
define('PUBLIC_SYSTEM_PATH', SYSTEM_PATH . '/public');
define('CONFIG_SYSTEM_PATH', SYSTEM_PATH . '/config');

// Carregando Configurações da Aplicação
$configs = parse_ini_file(CONFIG_SYSTEM_PATH . '/config.ini');
if (is_array($configs)) {
    foreach ($configs as $k => $v) {
        define($k, $v);
    }
}

// Autoload sem Composer
spl_autoload_register(function($classe){
    $classe = 'src/' . str_replace('\\', '/', $classe) . '.php';
    require_once $classe;
});