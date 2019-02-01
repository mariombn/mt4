<?php

namespace Repository;

use Entity\DispositivoEntity;

/**
 * Interface DispositivoRepositoryInterface
 * @package Repository
 */
interface DispositivoRepositoryInterface
{
    /**
     * Insere a Entidade Dispositivo no Banco de Dados
     * @param \Entity\DispositivoEntity $entity
     * @return \Entity\DispositivoEntity
     */
    public function incluir (DispositivoEntity $entity);

    /**
     * Altera um registro de dispositivo
     * @param \Entity\DispositivoEntity $entity
     * @return \Entity\DispositivoEntity
     */
    public function alterar (DispositivoEntity $entity);

    /**
     * Exclui um registro de Dispositivo
     * @param $id
     * @return bool
     */
    public function excluir ($id);

    /**
     * Retorna uma Entidade de Dispositivo
     * @param $id
     * @return \Entity\DispositivoEntity
     */
    public function obterPorId($id);

    /**
     * Retorna um array com entidades de Dispositivos
     * @return array
     */
    public function listar();
}