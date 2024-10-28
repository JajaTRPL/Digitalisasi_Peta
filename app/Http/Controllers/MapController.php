<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showMap()
    {
        $grounds = Ground::all(['coordinates']);

    // Bentuk FeatureCollection dari setiap koordinat ground
        $geoJsonData = [
            'type' => 'FeatureCollection',
            'features' => $grounds->map(function ($ground) {
                return json_decode($ground->coordinates); // Mengambil data GeoJSON langsung dari database
            })
        ];

        // Encode data menjadi JSON untuk dikirim ke Blade view
        $polygon = json_encode($geoJsonData);

        return view('ViewPeta', compact('polygon'));
    }
}
