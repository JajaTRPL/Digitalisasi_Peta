<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroundDetails extends Model
{
    use HasFactory;

    protected $table ='groundDetails';

    protected $fillable = ['id', 'nama_asset', 'status_kepemilikan', 'status_tanah', 'alamat', 'tipe_tanah', 'luas_asset'];

    public $incrementing = false;
    protected $keyType = 'string';

}
