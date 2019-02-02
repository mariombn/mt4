<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 02/02/19
 * Time: 18:23
 */

namespace Service;

use Service\HashSHA512Service;
use Service\HashHMACService;

class HashPessoalService implements HashServiceInterface
{
    /** @var string  */
    private $seed = '42';

    /** @var \Service\HashHMACService */
    private $hashHMAC;

    /** @var \Service\HashSHA512Service */
    private $hasSHA512;

    public function __construct(
        HashHMACService $hashHMAC,
        HashSHA512Service $hasSHA512
    ) {
        $this->hashHMAC = $hashHMAC;
        $this->hasSHA512 = $hasSHA512;
    }

    /**
     * Retorna Hash da String informada
     * @param string $string
     * @return string hash
     */
    public function gerarHash($string)
    {
        $string .= $this->seed;
        return $this->hasSHA512->gerarHash($this->hashHMAC->gerarHash(md5($string)));
    }
}