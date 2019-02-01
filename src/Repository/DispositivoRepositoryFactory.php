<?php

namespace Repository;

/**
 * Class DispositivoRepositoryFactory
 * @package Repository
 */
class DispositivoRepositoryFactory
{
    public static function create()
    {
        /** @var \Entity\DispositivoEntity $dispositivoEntity */
        $dispositivoEntity = new \Entity\DispositivoEntity();

        return new DispositivoRepository($dispositivoEntity);
    }
}