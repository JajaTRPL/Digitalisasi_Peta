<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroundDetails extends Model
{
    use HasFactory;

    protected $table ='ground_details';
    protected $fillable = ['nama_asset', 'alamat', 'luas_asset'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function statusKepemilikan()
    {
        return $this->belongsTo(StatusKepemilikan::class, 'status_kepemilikan_id');
    }

    public function statusTanah()
    {
        return $this->belongsTo(StatusTanah::class, 'status_tanah_id');
    }

    public function tipeTanah()
    {
        return $this->belongsTo(TipeTanah::class, 'tipe_tanah_id');
    }

    public function photoGround()
    {
        return $this->hasOne(PhotoGround::class, 'ground_detail_id');
    }

    public function sertificateGround()
    {
        return $this->belongsTo(SertificateGround::class, 'sertificate_ground_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
