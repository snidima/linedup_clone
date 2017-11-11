<?php
namespace App\Models\Observers;



use App\Events\ChatEvent;

class ChatObserver
{

    public function __construct()
    {

    }

    public function created( $model )
    {
        broadcast( new ChatEvent($model->from, $model->to, $model->message, $model->chanel) )->toOthers();
    }

}