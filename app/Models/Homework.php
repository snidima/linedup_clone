<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Homework extends Model
{
    protected $table = "homeworks";
    protected $fillable = ['user_id', 'course_id', 'lesson_id', 'path' ,'origin_name','youtube_link'];

    public function regular()
    {
        return $this->belongsTo(RegularCourse::class, 'course_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getVideoFrameAttribute()
    {
        return str_replace('watch?v=', 'embed/', $this->youtube_link);
    }

}
