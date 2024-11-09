<?php

namespace App\Http\Controllers;

use App\Models\StatusKepemilikan;
use App\Models\StatusTanah;
use App\Models\TipeTanah;
use Illuminate\Http\Request;

class ManageGroundController extends Controller
{
    public function show(){

        $statusKepemilikan = StatusKepemilikan::all();
        $statusTanah = StatusTanah::all();
        $tipeTanah = TipeTanah::all();

        return view('ManageGround', compact('statusKepemilikan', 'statusTanah', 'tipeTanah'));
    }
}
