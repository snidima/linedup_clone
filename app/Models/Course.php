<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "courses";

    protected $fillable = ['title', 'description', 'date_start' ,'date_end', 'active'];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_course', 'course_id', 'lesson_id')
//            ->as('info')
            ->withPivot('date_start', 'date_end');
    }

}
