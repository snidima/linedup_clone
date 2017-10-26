<?php

namespace App\Models;



use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

class RegularCourse extends Model
{
    protected $table = "regular_courses";

    protected $fillable = ['date_start'];


    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }


    public function getDateStartFAttribute()
    {
        $date = $this->date_start;
        return  Carbon::parse($date);
    }
}
