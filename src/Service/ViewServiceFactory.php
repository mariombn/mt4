<?php

namespace Service;

/**
 * Class ViewServiceFactory
 * @package Service
 */
class ViewServiceFactory
{
    public static function create()
    {
        return new ViewService();
    }
}