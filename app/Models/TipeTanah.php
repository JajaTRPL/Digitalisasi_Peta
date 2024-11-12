<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeTanah extends Model
{
    use HasFactory;

    protected $table ='tipe_tanah';

    protected $fillable = ['nama_tipe_tanah'];

    public $incrementing = false;
    protected $keyType = 'string';
}
