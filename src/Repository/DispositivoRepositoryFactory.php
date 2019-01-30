<?php

namespace Repository;

class DispositivoRepositoryFactory
{
    public static function create()
    {
        /** @var \Entity\DispositivoEntity $dispositivoEntity */
        $dispositivoEntity = new \Entity\DispositivoEntity();
        /** @var \Entity\DispositivoTipoEntity $dispositivoTipoEntity */
        $dispositivoTipoEntity = new \Entity\DispositivoTipoEntity();

        return new DispositivoRepository($dispositivoEntity, $dispositivoTipoEntity);
    }
}