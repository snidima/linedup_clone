<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

//todo add deleted observer
class Course extends Model
{
    protected $table = "courses";

    protected $fillable = ['title', 'description', 'active'];

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'course_lesson', 'course_id', 'lesson_id');

    }

    public function regularCourses()
    {
        return $this->hasMany(RegularCourse::class, 'course_id');
    }

}
