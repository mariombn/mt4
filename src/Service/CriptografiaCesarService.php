<?php

namespace Service;

/**
 * Class CriptografiaCesarService
 * @package Service
 */
class CriptografiaCesarService implements CriptografiaServiceInterface
{
    private $mapa;

    private $chave;


    public function __construct()
    {
        //echo '<pre>';
        $this->carregarMapa();

    }

    private function carregarMapa()
    {
        $this->mapa = array_merge(
            range('a', 'z'),
            range('A', 'Z'),
            range('0', '9'),
            [' ', '.', ',', '?', '!', '@', '#', '$', '%', '&', '*', '(', ')']);
    }

    public function criptografar($mensagem, $chave)
    {
        $this->chave = $chave;
        $mensagemArray = str_split($mensagem);
        $cript = '';

        print_r($mensagemArray);

        foreach ($mensagemArray as $letra)
        {
            $cript .= $this->mapper($letra);
        }
        echo $cript;
    }

    public function descriptogravar($mensagem, $chave)
    {

    }

    private function mapper($caracter)
    {
        return $this->mapa[array_search($caracter, $this->mapa) + $this->chave];
        //echo array_search($caracter, $this->mapa);
        //$k = $k + $this->chave;
        //return $this->mapa[$k];
    }
}