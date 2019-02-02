<?php

namespace Service;

/**
 * Class CriptografiaCesarService
 * @package Service
 */
class CriptografiaCesarService implements CriptografiaServiceInterface
{
    /** @var int */
    private $tamanhoAlfabeto = 256;

    /** @var int */
    private $scape = 32;

    /**
     * Criptograva uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function criptografar($mensagem, $chave)
    {
        if (!is_numeric($chave)) {
            return 'A chave para essa criptografia deve ser um número inteiro';
        }
        $criptografada = '';
        for ($i = 0; $i < strlen($mensagem); $i++) {
            $key = ord($mensagem[$i]);
            $novoCodigo = $key + $chave;
            $novoCodigo = $novoCodigo % $this->tamanhoAlfabeto;
            if ($novoCodigo >= 0 && $novoCodigo < $this->scape) {
                $novoCodigo += $this->scape;
            }
            $criptografada .= chr($novoCodigo);
        }
        return $criptografada;
    }

    /**
     * Descriptografa uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function descriptogravar($mensagem, $chave)
    {
        if (!is_numeric($chave)) {
            return 'A chave para a criptografia cesar deve ser um número inteiro';
        }
        $descriptografada = '';
        for ($i = 0; $i < strlen($mensagem); $i++) {
            $key = ord($mensagem[$i]);
            $novoCodigo = $key - $chave;
            $novoCodigo = $novoCodigo % $this->tamanhoAlfabeto;
            if ($novoCodigo >= 0 && $novoCodigo < $this->scape) {
                $novoCodigo += $this->scape;
            }
            $descriptografada .= chr($novoCodigo);
        }
        return $descriptografada;
    }
}