<?php
namespace Service;

class DispositivoService implements DispositivoServiceInterface
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

    public function teste()
    {
        echo 'Ola';
    }
}