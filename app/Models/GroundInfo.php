<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroundInfo extends Model
{
    use HasFactory;

    protected $table ='groundDetails';

    protected $fillable = ['nama_asset', 'status_kepemilikan', 'status_tanah', 'alamat', 'tipe_tanah', 'luas_asset'];
}
