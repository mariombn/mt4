<?php

namespace Service;

/**
 * Interface DispositivoServiceInterface
 * @package Service
 */
interface DispositivoServiceInterface
{
    const TIPO_SERVIDOR  = 'Servidor';
    const TIPO_ROTEADOR  = 'Roteador';
    const TIPO_SWITCH    = 'Switch';
    const TIPO_REPETIDOR = 'Repetidor';

    /**
     * retorna o array com todos os Tipos
     * @return array
     */
    public function getTipos();

    /**
     * Inclui um novo Dispositivo
     * @param $hostname
     * @param $ip
     * @param $tipo
     * @param $fabricante
     * @throws \Exception
     */
    public function incluir($hostname, $ip, $tipo, $fabricante);

    /**
     * Retorna endidade de acordo com o Id informado
     * @param $id
     * @return \Entity\DispositivoEntity
     */
    public function obterPorId($id);

    /**
     * Exclui um dispositivo
     * @param $id
     * @return bool
     */
    public function excluir($id);

    /**
     * Lista todos os Disposiivos cadastrados
     * @return array
     */
    public function listar();

    /**
     * @param $id
     * @param $hostname
     * @param $ip
     * @param $tipo
     * @param $fabricante
     * @throws \Exception
     * @return \Entity\DispositivoEntity
     */
    public function alterar($id, $hostname, $ip, $tipo, $fabricante);
}