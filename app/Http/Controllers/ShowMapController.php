<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundAddress;
use App\Models\GroundDetails;
use App\Models\GroundMarkers;
use App\Models\TipeTanah;
use Illuminate\Support\Facades\DB;
use App\Models\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $luas_asset = GroundDetails::findOrFail($detail->id)->luas_asset;
            $certificate = GroundDetails::findOrFail($detail->id)->sertificateGround->name;
            $alamat = GroundAddress::findOrFail($detail->alamat_id)->detail_alamat;
            $detail->detail_alamat = $alamat;
            $detail->photoGround = $photo;
            $detail->luas_asset = $luas_asset;
            $detail->certificate = $certificate;
            $data = [
                "$marker->latitude"."_"."$marker->longitude"=> $detail
            ];
            
            $tipe_tanah = TipeTanah::findOrFail($marker->groundDetail->tipe_tanah_id);
            $data["$marker->latitude"."_"."$marker->longitude"]["tipe_tanah"] = $tipe_tanah->nama_tipe_tanah;

            // Mengambil informasi ownership dari relasi statusKepemilikan
            $ownership = $detail->statusKepemilikan ? $detail->statusKepemilikan->nama_status : null;  // Memastikan kita mengakses nama status kepemilikan jika relasi ada
            $data["$marker->latitude"."_"."$marker->longitude"]["ownership"] = $ownership;

            // Menambahkan longitude ke data, jika diperlukan
            $data["$marker->latitude"."_"."$marker->longitude"]["longitude"] = $marker->longitude;

            return $data;
        });

        $dataGround = DB::table('ground_details')->select('ground_details.*')->get();



        // Encode data for use in the Blade view
        $polygonGeoJson = json_encode($polygonGeoJsonData);
        $markerGeoJson = json_encode($markerGeoJsonData);
        $detailsJson = json_encode($detailsData);
        $currentUser = Auth::user()->username;
        
        

        return view('ViewPeta', compact('polygonGeoJson', 'markerGeoJson', 'detailsJson', 'dataGround', 'currentUser'));
    }
}
