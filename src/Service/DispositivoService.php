<?php
namespace Service;

use Entity\DispositivoEntity;
use Repository\DispositivoRepository;

/**
 * Class DispositivoService
 * @package Service
 */
class DispositivoService implements DispositivoServiceInterface
{
    /** @var \Entity\DispositivoEntity */
    private $dispositivoEntity;

    /** @var \Repository\DispositivoRepository */
    private $dispositivoRepository;

    /** @var array  */
    private $tipos = [
        'Servidor'  => 'Servidor',
        'Roteador'  => 'Roteador',
        'Switch'    => 'Switch',
        'Repetidor' => 'Repetidor',
    ];

    public function __construct(
        DispositivoEntity $dispositivoEntity,
        DispositivoRepository $dispositivoRepository

    ) {
        $this->dispositivoEntity = $dispositivoEntity;
        $this->dispositivoRepository = $dispositivoRepository;
    }

    /**
     * retorna o array com todos os Tipos
     * @return array
     */
    public function getTipos()
    {
        return $this->tipos;
    }

    /**
     * Inclui um novo Dispositivo
     * @param $hostname
     * @param $ip
     * @param $tipo
     * @param $fabricante
     * @throws \Exception
     */
    public function incluir($hostname, $ip, $tipo, $fabricante)
    {
        if (empty($hostname) || empty($ip) || empty($tipo) || empty($fabricante)) {
            throw new \Exception("Parametros Invalidos");
        }

        if (!in_array($tipo, $this->getTipos())) {
            throw new \Exception("O tipo informádo é invalido");
        }

        $dispositivoEntity = clone $this->dispositivoEntity;

        $dispositivoEntity->setHostname($hostname);
        $dispositivoEntity->setIp($ip);
        $dispositivoEntity->setTipo($tipo);
        $dispositivoEntity->setFabricante($fabricante);

        $dispositivoEntity = $this->dispositivoRepository->incluir($dispositivoEntity);
    }

    /**
     * Retorna endidade de acordo com o Id informado
     * @param $id
     * @return \Entity\DispositivoEntity
     */
    public function obterPorId($id)
    {
        return $this->dispositivoRepository->obterPorId($id);
    }

    /**
     * Exclui um dispositivo
     * @param $id
     * @return bool
     */
    public function excluir($id)
    {
        return $this->dispositivoRepository->excluir($id);
    }

    /**
     * Lista todos os Disposiivos cadastrados
     * @return array
     */
    public function listar()
    {
        return $this->dispositivoRepository->listar();
    }

    /**
     * @param $id
     * @param $hostname
     * @param $ip
     * @param $tipo
     * @param $fabricante
     * @throws \Exception
     * @return \Entity\DispositivoEntity
     */
    public function alterar($id, $hostname, $ip, $tipo, $fabricante)
    {
        if (empty($hostname) || empty($ip) || empty($tipo) || empty($fabricante)) {
            throw new \Exception("Parametros Invalidos");
        }

        if (!in_array($tipo, $this->getTipos())) {
            throw new \Exception("O tipo informádo é invalido");
        }

        $dispositivoEntity = clone $this->dispositivoEntity;
        $dispositivoEntity->setId($id);
        $dispositivoEntity->setHostname($hostname);
        $dispositivoEntity->setIp($ip);
        $dispositivoEntity->setTipo($tipo);
        $dispositivoEntity->setFabricante($fabricante);
        return $this->dispositivoRepository->alterar($dispositivoEntity);
    }
}