<?php

namespace App\Models;



use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

//todo add deleted observer
class Course extends Model
{
    protected $table = "courses";

    protected $fillable = ['title', 'description', 'active'];

    protected $appends  = ['duration'];


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



    public function getFinalPriceAttribute()
    {
        return ( $this->new_price ) ? $this->new_price : $this->price;
    }

    public function getDurationAttribute()
    {
        return $this->lessons->sum('duration');
    }

}
