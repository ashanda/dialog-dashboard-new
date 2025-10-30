<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fishers extends Model
{
    protected $table = "fishers";
    protected $fillable = [
        'sinhala_name',
        'english_name',
        'tamil_name',
        'image_day1',
        'image_day2',
        'image_day3',
        'image_day4',
        'image_day5',
    ];
}
