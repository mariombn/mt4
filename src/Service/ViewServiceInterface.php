<?php

namespace Service;

/**
 * Interface ViewServiceInterface
 * @package Service
 */
interface ViewServiceInterface
{
    /**
     * Seta o titulo da Págna
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Renderiza o header de uma View
     */
    public function header();

    /**
     * Renderiza o footer de uma view
     */
    public function footer();

    /**
     * Exibe uma Mensagem de Erro na View
     * @param $mensagem
     */
    public function erro($mensagem);

    /**
     * Exibe uma Mensagem de Sucesso na View
     * @param $mensagem
     */
    public function sucesso($mensagem);
}