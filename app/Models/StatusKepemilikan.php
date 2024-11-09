<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKepemilikan extends Model
{
    use HasFactory;

    protected $table ='statusKepemilikan';

    protected $fillable = ['id', 'nama_status_kepemilikan'];

    public $incrementing = false;
    protected $keyType = 'string';
}
