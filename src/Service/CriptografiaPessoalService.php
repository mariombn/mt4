<?php

namespace Service;

use Service\HashPessoalService;

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

    /** @var \Service\HashPessoalService */
    private $hashPessoalService;

    public function __construct(
        HashPessoalService $hashPessoalService
    ) {
        $this->hashPessoalService = $hashPessoalService;
    }

    /**
     * Criptograva uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function criptografar($mensagem, $chave)
    {
        $chaveNumerica =  $this->processaChave($chave);

        return $chaveNumerica;
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
        return hexdec($this->hashPessoalService->gerarHash($chave));
    }
}