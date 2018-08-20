<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    protected $table = "billings";
    protected $fillable = ['user_id', 'course_id', 'promo', 'amount' ,'information'];


    public function promoCode()
    {
        return $this->belongsTo(PromoCodes::class, 'promo', 'code');
    }

    public function regular()
    {
        return $this->belongsTo(RegularCourse::class, 'course_id');
    }

    public function getCalculatedAmountAttribute()
    {
        $promo = PromoCodes::where('code', $this->promo)->first();

        if( $promo ){

            $need = $promo->value * $this->regular->finalPrice / 100;
            return $this->amount  + $need;

        }


        return $this->amount;
    }
}
