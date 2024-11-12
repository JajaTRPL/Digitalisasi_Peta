<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTanah extends Model
{
    use HasFactory;

    protected $table ='status_tanah';

    protected $fillable = ['nama_status_tanah'];

    public $incrementing = false;
    protected $keyType = 'string';
}
