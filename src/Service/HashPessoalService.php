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
    /**
     * Retorna Hash da String informada
     * @param string $string
     * @return string hash
     */
    public function gerarHash($string)
    {
        $string = '||' . $string . '||';

        $chaveApio = 42;
        for ($i = 0; $i < strlen($string); $i++) {
            $chaveApio += ord($string[$i]);
        }

        $superChave = 1;
        for ($i = 0; $i < strlen($string); $i++) {
            $superChave += $chaveApio*10*9*8*7*6*5*4*3*2*1 * ord($string[$i]);
        }

        $hex = dechex($superChave);

        $hex = str_replace('a', 'f', $hex);
        $hex = str_replace('b', 'e', $hex);
        $hex = str_replace('c', 'd', $hex);

        return $hex;
    }
}