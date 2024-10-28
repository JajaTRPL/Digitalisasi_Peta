<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = 'ground_points';
    protected $fillable = [
        'point_information_id',
        'latitude',
        'logtitude'
    ];
}
