<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\Point;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function showMap()
    {
        // Fetch all grounds and prepare the GeoJSON FeatureCollection for polygons
        $grounds = Ground::all(['coordinates']);
        $polygonGeoJsonData = [
            'type' => 'FeatureCollection',
            'features' => $grounds->map(function ($ground) {
                return json_decode($ground->coordinates); // Parse stored GeoJSON
            })
        ];

        // Fetch all markers and prepare the GeoJSON FeatureCollection for points
        $markers = Point::all();
        $markerGeoJsonData = [
            'type' => 'FeatureCollection',
            'features' => $markers->map(function ($marker) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [(float) $marker->longitude, (float) $marker->latitude],
                    ]
                ];
            }),
        ];

        // Encode data for use in the Blade view
        $polygonGeoJson = json_encode($polygonGeoJsonData);
        $markerGeoJson = json_encode($markerGeoJsonData);

        return view('ViewPeta', compact('polygonGeoJson', 'markerGeoJson'));
    }
}
