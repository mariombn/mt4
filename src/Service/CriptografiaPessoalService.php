<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 02/02/19
 * Time: 18:38
 */

namespace Service;


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
        $mensagem .= $this->seed;
        $s = strlen($mensagem) + 1;
        $nw = "";
        $n = $chave;
        for ($x = 1; $x < $s; $x++) {
            $m = $x * $n;
            if ($m > $s) {
                $indice = $m % $s;
            } else {
                if ($m < $s) {
                    $indice = $m;
                }
            }
            if ($m % $s == 0) {
                $indice = $x;
            }
            $nw = $nw . $mensagem[$indice - 1];
        }
        return $nw;
    }

    /**
     * Descriptografa uma Mensagem
     * @param string $mensagem
     * @param $chave
     * @return string
     */
    public function descriptogravar($mensagem, $chave)
    {
        $s = strlen($mensagem) + 1;
        $nw = "";
        $n = $chave;
        for ($y = 1; $y < $s; $y++) {
            $m = $y * $n;
            if ($m % $s == 1) {
                $n = $y;
                break;
            }
        }
        for ($x = 1; $x < $s; $x++) {
            $m = $x * $n;
            if ($m > $s) {
                $indice = $m % $s;
            } else {
                if ($m < $s) {
                    $indice = $m;
                }
            }
            if ($m % $s == 0) {
                $indice = $x;
            }
            $nw = $nw . $mensagem[$indice - 1];
        }
        $t = strlen($nw) - strlen($this->seed);
        return substr($nw, 0, $t);
    }
}