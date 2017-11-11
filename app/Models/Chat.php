<?php

namespace App\Models;



use App\Models\Observers\ChatObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use ObserverTrait;
    protected $table = "chat";
    protected $fillable = ['from', 'to', 'message'];

    protected static $observer = ChatObserver::class;

}
