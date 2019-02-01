<?php

namespace Service;


interface ViewServiceInterface
{
    public function header();

    public function footer();

    public function erro($mensagem);

    public function sucesso($mensagem);
}