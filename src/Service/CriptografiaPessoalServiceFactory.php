<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 02/02/19
 * Time: 18:38
 */

namespace Service;


class CriptografiaPessoalServiceFactory
{
    public static function create()
    {
        return new CriptografiaPessoalService();
    }
}