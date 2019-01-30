<?php

namespace Entity;

class DispositivoTipoEntity
{
    /** @var int */
    private $id;

    /** @var string */
    private $tipo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return DispositivoTipoEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     * @return DispositivoTipoEntity
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }
}