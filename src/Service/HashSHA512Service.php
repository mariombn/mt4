<?php

namespace Service;

/**
 * Class HashSHA512Service
 * @package Service
 */
class HashSHA512Service implements HashServiceInterface
{
    /** @var int  */
    private $rounds = 5000;
    /**
     * Retorna Hash da String informada
     * @param string $string
     * @return string hash
     */
    public function gerarHash($string)
    {
        $count = 0;
        while ($count < $this->rounds) {
            $string =  hash('sha512', $string);
            $count++;
        }
        return $string;
    }
}