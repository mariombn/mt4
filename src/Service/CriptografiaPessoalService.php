<?php

namespace Service;

/**
 * Class CriptografiaPessoalService
 * @package Service
 */
class CriptografiaPessoalService implements CriptografiaServiceInterface
{
    /**
     * @var string
     */
    public $seed = '42';

    /**
     * Criptograva uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function criptografar($mensagem, $chave)
    {
        return $this->processaChave($chave);
    }

    /**
     * Descriptografa uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function descriptogravar($mensagem, $chave)
    {

    }

    /**
     * Cria um Hash numérico para a chave digitada
     * @param $chave
     * @return int
     */
    private function processaChave($chave)
    {
        $superChave = 42;
        for ($i = 0; $i < strlen($chave); $i++) {
            $superChave = $superChave * ord($chave[$i]);
        }
        return $superChave;
    }
}