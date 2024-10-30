<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table = 'groundMarkers';

    protected $fillable = ['ground_detail_id', 'latitude', 'longitude'];

    public function groundDetail()
    {
        return $this->belongsTo(GroundInfo::class, 'ground_detail_id');
    }
}
