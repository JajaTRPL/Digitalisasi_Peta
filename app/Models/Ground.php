<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    use HasFactory;

    protected $fillable = ['marker_id', 'coordinates'];

    public function marker()
    {
        return $this->belongsTo(Point::class, 'marker_id');
    }
}
