<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCodes extends Model
{
    use SoftDeletes;
    protected $table = "promo_codes";
    protected $fillable = ['title', 'code', 'value'];
}
