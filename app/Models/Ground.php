<?php

namespace App\Models;

use App\StatusKepemilikan;
use App\StatusTanah;
use App\TipeTanah;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ground extends Model
{
    use HasFactory;

    protected $table = 'grounds';
    protected $fillable = ['coordinated', 'id', 'ground_detail_id'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function marker()
    {
        return $this->belongsTo(GroundMarkers::class, 'marker_id');
    }

}
