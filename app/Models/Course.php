<?php

namespace App\Models;



use Carbon\Carbon;
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

    public function regular()
    {
        return $this->hasOne(RegularCourse::class, 'course_id');
    }






    public function getPriceFAttribute()
    {
        $priceF = number_format((int)$this->price, 0, ' ', ' ');
        return $priceF;
    }
    public function getNewPriceFAttribute()
    {
        $priceF = number_format((int)$this->new_price, 0, ' ', ' ');
        return $priceF;
    }

    public function getDateEndAttribute()
    {
        $days = $this->lessons->sum('duration');
        $dateStart = $this->regular->date_start;
        //->toDateString();
        return Carbon::parse($dateStart)->addDays( $days );
    }

    public function getDurationAttribute()
    {
        $dateEnd = $this->dateEnd;
        $dateStart = Carbon::parse($this->regular->date_start);
        return $dateStart->diffInDays( $dateEnd );
    }

}
