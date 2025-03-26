<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fishers extends Model
{
    protected $table = "fishers";
    protected $fillable = [
        'name',
        'image',
    ];
}
