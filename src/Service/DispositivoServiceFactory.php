<?php

namespace Service;

class DispositivoServiceFactory
{
    public static function create()
    {
        /** @var \Entity\DispositivoEntity $dispositivoEntity */
        $dispositivoEntity = new \Entity\DispositivoEntity();
        /** @var \Entity\DispositivoTipoEntity $dispositivoTipoEntity */
        $dispositivoTipoEntity = new \Entity\DispositivoTipoEntity();

        return new DispositivoService($dispositivoEntity, $dispositivoTipoEntity);
    }
}