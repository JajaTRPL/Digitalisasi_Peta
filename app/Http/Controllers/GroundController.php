<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundInfo;
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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nama_asset' => 'required|string',
            'status_kepemilikan' => 'required|string',
            'status_tanah' => 'required|string',
            'alamat' => 'required|string',
            'tipe_tanah' => 'required|string',
            'luas_asset' => 'required|numeric',
        ]);

        // Membuat objek Ground baru
        $information = new GroundInfo();
        $information->nama_asset = $request->nama_asset;
        $information->status_kepemilikan = $request->status_kepemilikan;
        $information->status_tanah = $request->status_tanah;
        $information->alamat = $request->alamat;
        $information->tipe_tanah = $request->tipe_tanah;
        $information->luas_asset = $request->luas_asset;
        $information->save();

        // Membuat GroundMarker dan kaitkan dengan GroundDetail
        $marker = new Point();
        $marker->latitude = $request->latitude;
        $marker->longitude = $request->longitude;
        $marker->ground_detail_id = $information->id;
        $marker->save();

        // Membuat Ground dengan marker_id dari marker yang baru saja disimpan
        $ground = new Ground();
        $ground->coordinates = $request->coordinates;
        $ground->marker_id = $marker->id; // Menggunakan ID yang dihasilkan untuk marker_id
        $ground->save();

        // Mengembalikan response
        return response()->json(['message' => 'Ground saved successfully!'], 201);
    }
}
