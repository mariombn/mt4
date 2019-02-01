<?php

namespace Service;

class DispositivoServiceFactory
{
    public static function create()
    {
        /** @var \Entity\DispositivoEntity $dispositivoEntity */
        $dispositivoEntity = new \Entity\DispositivoEntity();

        /** @var \Repository\DispositivoRepositoryFactory $dispositivoRepository */
        $dispositivoRepository = \Repository\DispositivoRepositoryFactory::create();

        return new DispositivoService($dispositivoEntity, $dispositivoRepository);
    }
}