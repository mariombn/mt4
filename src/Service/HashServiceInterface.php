<?php

namespace Service;

/**
 * Interface HashServiceInterface
 * @package Service
 */
interface HashServiceInterface
{
    /**
     * Retorna Hash da String informada
     * @param string $string
     * @return string hash
     */
    public function gerarHash($string);
}