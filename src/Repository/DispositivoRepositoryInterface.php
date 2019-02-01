<?php

namespace Repository;

use Entity\DispositivoEntity;

interface DispositivoRepositoryInterface
{
    public function incluir (DispositivoEntity $entity);

    public function alterar (DispositivoEntity $entity);

    public function excluir ($id);

    public function obterPorId($id);

    public function listar();
}