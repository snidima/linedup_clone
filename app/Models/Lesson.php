<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;
    protected $table = "lessons";
    protected $fillable = ['sort', 'title', 'description','short_description','complexity', 'online_player' ,'download_link', 'active', 'duration'];
}
