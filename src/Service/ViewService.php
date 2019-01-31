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
}