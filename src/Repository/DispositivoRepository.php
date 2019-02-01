<?php

namespace Repository;

use Entity\DispositivoEntity;
use Service\DataBaseService;

/**
 * Class DispositivoRepository
 * Classe responsavel pela persistencia dos dados de dispositivos
 * @package Repository
 */
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

    /**
     * Altera um registro de dispositivo
     * @param \Entity\DispositivoEntity $entity
     * @return \Entity\DispositivoEntity
     */
    public function alterar(DispositivoEntity $entity)
    {
        $conexao = DataBaseService::obterConexao();
        $sql = "UPDATE `dispositivos` SET `hostname` = :hostname, `ip` = :ip, `tipo` = :tipo, `fabricante` = :fabricante WHERE `id` = :id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(':id', $entity->getId());
        $prepare->bindValue(':hostname', $entity->getHostname());
        $prepare->bindValue(':ip', $entity->getIp());
        $prepare->bindValue(':tipo', $entity->getTipo());
        $prepare->bindValue(':fabricante', $entity->getFabricante());

        if (!$prepare->execute()) {
            throw new \PDOException('Erro ao alterar registro no Banco de Dados');
        }
        return $entity;
    }

    /**
     * Exclui um registro de Dispositivo
     * @param $id
     * @return bool
     */
    public function excluir ($id)
    {
        $conexao = DataBaseService::obterConexao();
        $sql = "DELETE FROM `dispositivos` WHERE `id` = :id";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(':id', $id);
        if (!$prepare->execute()) {
            throw new \PDOException('Erro ao Excluir registro do Banco de Dados');
        }
        return true;
    }

    /**
     * Retorna uma Entidade de Dispositivo
     * @param $id
     * @return \Entity\DispositivoEntity
     */
    public function obterPorId($id)
    {
        $conexao = DataBaseService::obterConexao();
        $query = "SELECT `id`, `hostname`, `ip`, `tipo`, `fabricante` FROM `dispositivos` WHERE `id` = :id";
        $prepare = $conexao->prepare($query);
        $prepare->bindValue(':id', $id);
        if (!$prepare->execute()) {
            throw new \PDOException('Erro ao obter Registro do Banco de Dados');
        }

        $row = $prepare->fetch(\PDO::FETCH_ASSOC);

        $entity = clone $this->dispositivoEntity;
        $entity->setId($row['id']);
        $entity->setHostname($row['hostname']);
        $entity->setIp($row['ip']);
        $entity->setTipo($row['tipo']);
        $entity->setFabricante($row['fabricante']);
        return $entity;
    }

    /**
     * Retorna um array com entidades de Dispositivos
     * @return array
     */
    public function listar()
    {
        $conexao = DataBaseService::obterConexao();
        $query = "SELECT `id`, `hostname`, `ip`, `tipo`, `fabricante` FROM `dispositivos` ORDER BY `id`";
        $prepare = $conexao->prepare($query);
        if (!$prepare->execute()) {
            throw new \PDOException('Erro ao obter registros do Banco de Dados');
        }

        $row = $prepare->fetch(\PDO::FETCH_ASSOC);

        $retorno = [];

        while ($row) {
            $entity = clone $this->dispositivoEntity;
            $entity->setId($row['id']);
            $entity->setHostname($row['hostname']);
            $entity->setIp($row['ip']);
            $entity->setTipo($row['tipo']);
            $entity->setFabricante($row['fabricante']);
            $retorno[] = $entity;
            $row = $prepare->fetch(\PDO::FETCH_ASSOC);
        }
        return $retorno;
    }
}