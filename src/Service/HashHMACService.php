<?php

namespace Service;

/**
 * Class HashHMACService
 * @package Service
 */
class HashHMACService implements HashServiceInterface
{
    private $seguro = 'haval256,5';

    /**
     * Retorna Hash da String informada
     * @param string $string
     * @return string hash
     */
    public function gerarHash($string)
    {
        return hash_hmac($this->seguro, $string, '42');
    }
}