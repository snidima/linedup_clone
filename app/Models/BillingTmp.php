<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class BillingTmp extends Model
{
    protected $table = "billings_tmp";
    protected $fillable = ['user_id', 'course_id', 'promo'];


    public function promoCode()
    {
        return $this->belongsTo(PromoCodes::class, 'promo', 'code');
    }

    public function regular()
    {
        return $this->belongsTo(RegularCourse::class, 'course_id');
    }
}
