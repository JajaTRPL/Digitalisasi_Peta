<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundDetails;
use App\Models\GroundMarkers;
use App\Models\TipeTanah;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use Illuminate\Http\Request;

class ShowMapController extends Controller
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
        $markers = GroundMarkers::all();
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

        $detailsData = $markers->map(function($marker){
            $detail = $marker->groundDetail;
            $photo = GroundDetails::findOrFail($detail->id)->photoGround->name;
            $detail->photoGround = $photo;
            $data = [
                "$marker->latitude"."_"."$marker->longitude"=> $detail
            ];
            $tipe_tanah = TipeTanah::findOrFail($marker->groundDetail->tipe_tanah_id);
            $data["$marker->latitude"."_"."$marker->longitude"]["tipe_tanah"] = $tipe_tanah->nama_tipe_tanah;

            return $data;
        });

    

        // Encode data for use in the Blade view
        $polygonGeoJson = json_encode($polygonGeoJsonData);
        $markerGeoJson = json_encode($markerGeoJsonData);
        $detailsJson = json_encode($detailsData);

        return view('ViewPeta', compact('polygonGeoJson', 'markerGeoJson', 'detailsJson'));
    }
}
