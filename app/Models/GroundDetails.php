<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroundDetails extends Model
{
    use HasFactory;

    protected $table ='ground_details';
    protected $fillable = ['nama_asset', 'alamat', 'luas_asset', 'id'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function luasAsset()
    {
        return $this->belongsTo(LuasAsset::class, 'luas_asset');
    }

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
        return $this->hasOne(SertificateGround::class, 'ground_detail_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function alamat_id()
    {
        return $this->belongsTo(GroundAddress::class, 'alamat_id');
    }

}
