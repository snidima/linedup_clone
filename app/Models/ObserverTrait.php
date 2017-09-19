<?php
namespace App\Models;



trait ObserverTrait
{
    public static function boot()
    {
        parent::boot();
        self::observe( self::$observer );

    }
}