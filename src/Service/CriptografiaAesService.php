<?php

namespace Service;

/**
 * Class CriptografiaAesService
 * @package Service
 */
class CriptografiaAesService implements CriptografiaServiceInterface
{
    private $iv;

    private $method;

    public function __construct()
    {
        $this->carregar();
    }

    private function carregar()
    {
        $this->iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $this->method = 'aes-256-cbc';

    }

    private function gerarKey($chave)
    {
        return substr(hash('sha256', $chave, true), 0, 32);
    }

    /**
     * Criptograva uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function criptografar($mensagem, $chave)
    {
        $key = $this->gerarKey($chave);
        return base64_encode(openssl_encrypt($mensagem, $this->method, $key, OPENSSL_RAW_DATA, $this->iv));
    }

    /**
     * Descriptografa uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function descriptogravar($mensagem, $chave)
    {
        $key = $this->gerarKey($chave);
        return $decrypted = openssl_decrypt(base64_decode($mensagem), $this->method, $key, OPENSSL_RAW_DATA, $this->iv);
    }
}