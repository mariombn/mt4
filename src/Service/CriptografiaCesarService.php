<?php

namespace Service;

/**
 * Class CriptografiaCesarService
 * @package Service
 */
class CriptografiaCesarService implements CriptografiaServiceInterface
{
    /** @var array */
    private $mapa;

    /** @var string */
    private $chave;

    public function __construct()
    {
        $this->carregarMapa();
    }

    /**
     * Metodo que carrega o array que será mapeado. Caracteres fora deste array não vão funcionar na criptografia
     */
    private function carregarMapa()
    {
        $this->mapa = array_merge(
            range('a', 'z'),
            range('A', 'Z'),
            range('0', '9'),
            [' ', '.', ',', '?', '!', '@', '#', '$', '%', '&', '*', '(', ')']);
    }

    /**
     * Criptograva uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function criptografar($mensagem, $chave)
    {
        $this->chave = $chave;
        $mensagemArray = str_split($mensagem);
        $cript = '';

        foreach ($mensagemArray as $letra) {
            $cript .= $this->mapper($letra, true);
        }
        return $cript;
    }

    /**
     * Descriptografa uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function descriptogravar($mensagem, $chave)
    {
        $this->chave = $chave;
        $mensagemArray = str_split($mensagem);
        $decrip = '';

        foreach ($mensagemArray as $letra) {
            $decrip .= $this->mapper($letra, false);
        }
        return $decrip;
    }

    /**
     * Troca o caracter especifico de acordo com a chave
     * @param $caracter
     * @param $crip
     * @return mixed
     */
    private function mapper($caracter, $crip)
    {
        if ($crip) {
            return $this->mapa[array_search($caracter, $this->mapa) + $this->chave];
        }
        return $this->mapa[array_search($caracter, $this->mapa) - $this->chave];
    }
}