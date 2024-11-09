<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundDetails;
use App\Models\GroundMarkers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GroundDetailsController extends Controller
{
    public function showData(){
        $dataGround = DB::table('groundDetails')
        ->join('groundMarkers', 'groundDetails.id', '=', 'groundMarkers.ground_detail_id')
        ->join('grounds', 'groundMarkers.id', '=', 'grounds.marker_id')
        ->select('groundDetails.id as ground_detail_id', 'groundDetails.nama_asset', 'groundDetails.updated_at')
        ->get();

        return view('ManageGround', compact('dataGround'));
    }

    public function edit($id){
        $dataGround = DB::table('groundDetails')
        ->join('groundMarkers', 'groundDetails.id', '=', 'groundMarkers.ground_detail_id')
        ->join('grounds', 'groundMarkers.id', '=', 'grounds.marker_id')
        ->select('groundDetails.*', 'groundMarkers.*', 'grounds.*')
        ->where('groundDetails.id', $id)
        ->first();

        $statusKepemilikan = DB::table('statusKepemilikan')->get();
        $statusTanah = DB::table('statusTanah')->get();
        $tipeTanah = DB::table('tipeTanah')->get();

        $dataGroundCoordinate = DB::table('groundDetails')
        ->join('groundMarkers', 'groundDetails.id', '=', 'groundMarkers.ground_detail_id')
        ->join('grounds', 'groundMarkers.id', '=', 'grounds.marker_id')
        ->select('groundMarkers.latitude', 'groundMarkers.longitude','grounds.coordinates')
        ->where('groundDetails.id', $id)
        ->get();

        $polygonDataGround = [
            'type' => 'FeatureCollection',
            'features' => $dataGroundCoordinate->map(function ($dataGroundCoordinate) {
                return json_decode($dataGroundCoordinate->coordinates);
            })
        ];

        $markerDataGround = [
            'type' => 'FeatureCollectioin',
            'features' => $dataGroundCoordinate->map(function ($dataGroundCoordinate) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [(float) $dataGroundCoordinate->longitude, (float) $dataGroundCoordinate->latitude],
                    ]
                    ];
            }),
        ];


        $polygon = json_encode($polygonDataGround);
        $marker = json_encode($markerDataGround);


        return view('EditGround', compact('dataGround', 'statusKepemilikan', 'statusTanah', 'tipeTanah', 'polygon', 'marker'));
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        $ground = GroundDetails::find($id);

        $ground ->delete();

        return redirect('/ManageGround')->with('pesan', 'Data ground berhasil di Hapus');
    }
}
