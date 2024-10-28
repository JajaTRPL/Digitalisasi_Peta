<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\Point;
use App\Models\GroundInformation;
use Illuminate\Http\Request;

class GroundController extends Controller
{
    public function saveGround(Request $request)
    {
        // Validasi input
        $request->validate([
            'coordinates' => 'required|json',
        ]);

        // Membuat objek Ground baru
        $ground = new Ground();
        $ground->coordinates = $request->coordinates;
        $ground->save();

        // Mengembalikan response
        return response()->json(['message' => 'Ground saved successfully!'], 201);
    }
}
