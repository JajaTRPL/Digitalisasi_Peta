<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroundAddress extends Model
{
    use HasFactory;

    protected $table = 'ground_address';
    protected $fillable = ['detail_alamat', 'rt', 'rw', 'padukuhan'];

    public $incrementing = false;
    protected $keyType = 'string';
}
