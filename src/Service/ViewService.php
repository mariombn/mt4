<?php

namespace Service;

/**
 * Class ViewService
 * @package Service
 */
class ViewService implements ViewServiceInterface
{
    /** @var string */
    private $title;

    /**
     * Seta o titulo da Págna
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Renderiza o header de uma View
     */
    public function header()
    {
        include SYSTEM_PATH . '/src/Layout/header.php';
    }

    /**
     * Renderiza o footer de uma view
     */
    public function footer()
    {
        include SYSTEM_PATH . '/src/Layout/footer.php';
    }

    /**
     * Exibe uma Mensagem de Erro na View
     * @param $mensagem
     */
    public function erro($mensagem)
    {
        echo "<div class='alert alert-danger' role='alert'>";
        echo $mensagem;
        echo "</div>";
    }

    /**
     * Exibe uma Mensagem de Sucesso na View
     * @param $mensagem
     */
    public function sucesso($mensagem)
    {
        echo "<div class='alert alert-success' role='alert'>";
        echo $mensagem;
        echo "</div>";
    }
}