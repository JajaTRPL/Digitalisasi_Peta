<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroundMarkers extends Model
{
    use HasFactory;

    protected $table = 'ground_markers';

    protected $fillable = ['latitude', 'longitude'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function groundDetail()
    {
        return $this->belongsTo(GroundDetails::class, 'ground_detail_id');
    }
}
