<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertificateGround extends Model
{
    use HasFactory;

    protected $table = 'ground_certificates';
    protected $fillable = ['name', 'size'];
    public $incrementing = false;
    protected $keyType = 'string';
}
