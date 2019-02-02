<?php

namespace Service;

/**
 * Class CriptografiaPessoalServiceFactory
 * @package Service
 */
class CriptografiaPessoalServiceFactory
{
    public static function create()
    {
        return new CriptografiaPessoalService();
    }
}