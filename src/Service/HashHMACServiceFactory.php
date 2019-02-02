<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 02/02/19
 * Time: 17:07
 */

namespace Service;

/**
 * Class HashHMACServiceFactory
 * @package Service
 */
class HashHMACServiceFactory
{
    public static function create()
    {
        return new HashHMACService();
    }
}