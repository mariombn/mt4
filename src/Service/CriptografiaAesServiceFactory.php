<?php

namespace Service;


class CriptografiaAesServiceFactory
{
    public static function create()
    {
        return new CriptografiaAesService();
    }
}