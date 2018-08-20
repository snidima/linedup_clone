<?php

namespace App\Models;



use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RegularCourse extends Model
{
    protected $table = "regular_courses";

    protected $fillable = ['date_start', 'price', 'new_price'];

    protected $appends  = ['date_end'];



    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function billing()
    {
        return $this->hasOne(Billing::class, 'course_id')->where('user_id', Auth::id());
    }



    public function getDateStartFAttribute()
    {
        $date = $this->date_start;
        return  Carbon::parse($date);
    }

    public function getDateEndAttribute()
    {

        $days = $this->course->lessons->sum('duration');
        $dateStart = $this->dateStartF;

        return Carbon::parse($dateStart)->addDays( $days );
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

        return ( $new_price ) ? $new_price*1 : $price*1;
    }

    public function getDateCounterAttribute()
    {
        if( !$this->date_start ) return false;

        $nextMonday = Carbon::now()->diffInHours(Carbon::parse($this->date_start), true);



        if( $nextMonday <= 0 ) return false;

        $days = floor( $nextMonday / 24 );
        $hours = $nextMonday - ($days * 24);

        $counter = [
            'days' =>   $days,
            'hours' =>   $hours
        ];


        return $counter;
    }




}
