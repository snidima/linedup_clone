<?php

namespace App\Models;



use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

class RegularCourse extends Model
{
    protected $table = "regular_courses";

    protected $fillable = ['date_start', 'price', 'new_price'];




    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }


    public function getDateStartFAttribute()
    {
        $date = $this->date_start;
        return  Carbon::parse($date);
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
        $price = $this->price;
        $new_price = $this->new_price;

        return ( $new_price ) ? $new_price : $price;
    }

}
