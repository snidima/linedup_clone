<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homework extends Model
{
    protected $table = "homeworks";
    protected $fillable = ['user_id', 'course_id', 'lesson_id', 'path' ,'origin_name'];
}
