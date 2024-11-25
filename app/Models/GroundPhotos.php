<?php

namespace App\Models;

use App\StatusKepemilikan;
use App\StatusTanah;
use App\TipeTanah;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroundPhotos extends Model
{
    use HasFactory;

    protected $table ='ground_photos';

    
}
