<?php

namespace Repository;

class DispositivoRepository implements DispositivoRepositoryInterface
{
    /** @var \Entity\DispositivoEntity */
    private $dispositivoEntity;

    /** @var \Entity\DispositivoTipoEntity */
    private $dispositivoTipoEntity;

    public function __construct(
        \Entity\DispositivoEntity $dispositivoEntity,
        \Entity\DispositivoTipoEntity $dispositivoTipoEntity
    )
    {
        $this->dispositivoEntity = $dispositivoEntity;
        $this->dispositivoTipoEntity = $dispositivoTipoEntity;
    }
}