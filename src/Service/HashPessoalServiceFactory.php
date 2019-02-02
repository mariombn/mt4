<?php

namespace Service;

/**
 * Class HashPessoalServiceFactory
 * @package Service
 */
class HashPessoalServiceFactory
{
    public static function create()
    {
        return new HashPessoalService();
    }
}