<?php

namespace Service;

/**
 * Class CriptografiaCesarServiceFactory
 * @package Service
 */
class CriptografiaCesarServiceFactory
{
    public static function create()
    {
        return new CriptografiaCesarService();
    }
}