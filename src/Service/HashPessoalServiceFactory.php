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
        $hashHMAC = \Service\HashHMACServiceFactory::create();
        $hasSHA512 = \Service\HashSHA512ServiceFactory::create();
        return new HashPessoalService($hashHMAC, $hasSHA512);
    }
}