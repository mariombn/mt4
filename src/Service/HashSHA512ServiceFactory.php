<?php

namespace Service;

/**
 * Class HashSHA512ServiceFactory
 * @package Service
 */
class HashSHA512ServiceFactory
{
    public static function create()
    {
        return new HashSHA512Service();
    }
}