<?php

namespace Service;

/**
 * Class CriptografiaCesarService
 * @package Service
 */
class CriptografiaCesarService implements CriptografiaServiceInterface
{
    /**
     * Criptograva uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function criptografar($mensagem, $chave)
    {
        $tamanhoAlfabeto = 256;
        $scape = 32;

        $criptografada = '';

        for ($i = 0; $i < strlen($mensagem); $i++) {
            $key = ord($mensagem[$i]);
            $novoCodigo = $key + $chave;
            $novoCodigo = $novoCodigo % $tamanhoAlfabeto;
            if ($novoCodigo >= 0 && $novoCodigo < $scape) {
                $novoCodigo += $scape;
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
        $tamanhoAlfabeto = 256;
        $scape = 32;

        $descriptografada = '';

        for ($i = 0; $i < strlen($mensagem); $i++) {
            $key = ord($mensagem[$i]);
            $novoCodigo = $key - $chave;
            $novoCodigo = $novoCodigo % $tamanhoAlfabeto;
            if ($novoCodigo >= 0 && $novoCodigo < $scape) {
                $novoCodigo += $scape;
            }
            $descriptografada .= chr($novoCodigo);
        }
        return $descriptografada;
    }

}