<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 01/02/19
 * Time: 14:25
 */

namespace Service;

use PDO;

class DataBaseService
{
    public static $conexao;

    /**
     * Retorna Conexao PDO com Banco de Dados
     * @return \PDO
     */
    public static function obterConexao()
    {
        if (!isset(self::$conexao)) {
            self::$conexao = new PDO('mysql:host=localhost;dbname=mt4', 'root', 'local',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conexao->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$conexao;
    }
}