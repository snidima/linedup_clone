<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class RegularCourse extends Model
{
    protected $table = "regular_courses";

    protected $fillable = ['date_start'];

}
