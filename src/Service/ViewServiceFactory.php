<?php

namespace Service;

class ViewServiceFactory
{
    public static function create()
    {
        return new ViewService();
    }
}