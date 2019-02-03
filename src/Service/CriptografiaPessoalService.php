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
        $chave = $this->processaChave($chave);

        $decimalValues = [];
        for ($i = 0; $i < strlen($mensagem); $i++) {
            $decimalValues[] = dechex(ord($mensagem[$i]) + $chave);
        }

        $resultado = '';
        foreach ($decimalValues as $v) {
            $resultado .= $v;
        }
        return $resultado;
    }

    /**
     * Descriptografa uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function descriptogravar($mensagem, $chave)
    {
        $chave = $this->processaChave($chave);
        $mensagem = str_split($mensagem, 2);
        $resultado = "";
        foreach ($mensagem as $hex) {
            $resultado .= chr(hexdec($hex) - $chave);
        }
        return $resultado;
    }

    /**
     * Cria um Hash numérico para a chave digitada
     * @param $chave
     * @return int
     */
    private function processaChave($chave)
    {
        $k = hexdec($this->hashPessoalService->gerarHash($chave));
        return substr($k, 0, 1) . substr($k, -1, 1);
    }

}