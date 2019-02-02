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
        /** @var \Service\HashPessoalService $hashPessoal */
        $hashPessoal = \Service\HashPessoalServiceFactory::create();

        return new CriptografiaPessoalService($hashPessoal);
    }
}