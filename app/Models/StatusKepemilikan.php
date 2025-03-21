<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKepemilikan extends Model
{
    use HasFactory;

    protected $table = 'status_kepemilikan';

    protected $fillable = ['nama_status_kepemilikan'];

    public $incrementing = false;

    protected $keyType = 'string';
}
