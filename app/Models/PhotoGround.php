<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGround extends Model
{
    use HasFactory;

    protected $table = 'ground_photos';
    protected $fillable = ['name', 'size'];
    public $incrementing = false;
    protected $keyType = 'string';
}
