<?php

namespace Service;

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

    public function header()
    {
        include SYSTEM_PATH . '/src/Layout/header.php';
    }

    public function footer()
    {
        include SYSTEM_PATH . '/src/Layout/footer.php';
    }

    public function erro($mensagem)
    {
        echo "<div class='alert alert-danger' role='alert'>";
        echo $mensagem;
        echo "</div>";
    }

    public function sucesso($mensagem)
    {
        echo "<div class='alert alert-success' role='alert'>";
        echo $mensagem;
        echo "</div>";
    }
}