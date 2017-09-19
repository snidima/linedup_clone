<?php
namespace App\Models\Observers;

class UserObserver
{
    public function created( $model )
    {
        dd( $model );
    }
}