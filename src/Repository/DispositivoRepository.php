<?php

namespace Repository;

use Entity\DispositivoEntity;
use Service\DataBaseService;

class DispositivoRepository implements DispositivoRepositoryInterface
{
    /** @var \Entity\DispositivoEntity */
    private $dispositivoEntity;

    public function __construct(
        DispositivoEntity $dispositivoEntity
    ) {
        $this->dispositivoEntity = $dispositivoEntity;
    }

    /**
     * Insere a Entidade Dispositivo no Banco de Dados
     * @param \Entity\DispositivoEntity $entity
     * @return \Entity\DispositivoEntity
     */
    public function incluir(DispositivoEntity $entity)
    {
        /** @var \PDO $conexao */
        $conexao = DataBaseService::obterConexao();
        $sql = "INSERT INTO `dispositivos` (`hostname`, `ip`, `tipo`, `fabricante`) VALUES (:hostname, :ip, :tipo, :fabricante)";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(':hostname', $entity->getHostname());
        $prepare->bindValue(':ip', $entity->getIp());
        $prepare->bindValue(':tipo', $entity->getTipo());
        $prepare->bindValue(':fabricante', $entity->getFabricante());

        if (!$prepare->execute()) {
            throw new \PDOException('Erro ao incerir dados no Banco de Dados');
        }
        $entity->setId($conexao->lastInsertId());
        return $entity;
    }

    public function alterar(DispositivoEntity $entity)
    {

    }

    public function excluir ($id)
    {

    }

    public function obterPorId($id)
    {

    }

    public function listar()
    {

    }
}