<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = "lessons";
    protected $fillable = ['sort', 'title', 'description', 'online_player' ,'download_link', 'active'];
}
