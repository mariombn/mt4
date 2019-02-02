<?php

namespace Service;

/**
 * Interface CriptografiaServiceInterface
 * @package Service
 */
interface CriptografiaServiceInterface
{
    /**
     * Criptograva uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function criptografar($mensagem, $chave);

    /**
     * Descriptografa uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function descriptogravar($mensagem, $chave);
}