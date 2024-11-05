<?php

namespace App\Http\Controllers;

use App\Models\GroundDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GroundDetailsController extends Controller
{
    public function index(){
        $dataGround = DB::table('groundDetails')
        ->join('groundMarkers', 'groundDetaiils.id', '=', 'groundMarkers.ground_detail_id')
        ->join('grounds', 'groundMarkers.id', '=', 'grounds.marker_id')
        ->select('groundDetails.*', 'grounsMarkers.*', 'grounds.*')
        ->get();

        return $dataGround;
    }
}
