<?php

namespace Entity;


class DispositivoEntity
{
    /** @var int */
    private $id;

    /** @var string */
    private $hostname;

    /** @var string */
    private $ip;

    /** @var string */
    private $fabricante;

    /** @var \Entity\DispositivoTipoEntity */
    private $dispositivoTipo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return DispositivoEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     * @return DispositivoEntity
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     * @return DispositivoEntity
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
        return $this;
    }

    /**
     * @return string
     */
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * @param string $fabricante
     * @return DispositivoEntity
     */
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;
        return $this;
    }

    /**
     * @return \Entity\DispositivoTipoEntity
     */
    public function getDispositivoTipo()
    {
        return $this->dispositivoTipo;
    }

    /**
     * @param \Entity\DispositivoTipoEntity $dispositivoTipo
     * @return DispositivoEntity
     */
    public function setDispositivoTipo($dispositivoTipo)
    {
        $this->dispositivoTipo = $dispositivoTipo;
        return $this;
    }


}