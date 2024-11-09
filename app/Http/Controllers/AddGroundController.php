<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundDetails;
use App\Models\GroundMarkers;
use App\Models\StatusKepemilikan;
use App\Models\StatusTanah;
use App\Models\TipeTanah;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddGroundController extends Controller
{
    public function show(){

        $statusKepemilikan = StatusKepemilikan::all();
        $statusTanah = StatusTanah::all();
        $tipeTanah = TipeTanah::all();

        return view('AddGround', compact('statusKepemilikan', 'statusTanah', 'tipeTanah'));
    }

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
            'foto_tanah' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'sertifikat' => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);


        $groundDetailsID = IdGenerator::generate([
            'table' => 'grounddetails',
            'length' => 8,
            'prefix' => 'GD-',
        ]);

        $currentUserID = Auth::user()->id;

        // Membuat objek Ground baru
        $information = new GroundDetails();
        $information->id = $groundDetailsID;
        $information->nama_asset = $request->nama_asset;
        $information->alamat = $request->alamat;
        $information->luas_asset = $request->luas_asset;
        $information->status_kepemilikan_id = $request->status_kepemilikan;
        $information->status_tanah_id = $request->status_tanah;
        $information->tipe_tanah_id = $request->tipe_tanah;
        $information->foto_ground = $request->foto_tanah;
        $information->sertifikat = $request->sertifikat;
        $information->user_id = $currentUserID;
        $information->save();


        $groundMarkersID = IdGenerator::generate([
            'table' => 'groundmarkers',
            'length' => 8,
            'prefix' => 'GM-',
        ]);

        // Membuat GroundMarker dan kaitkan dengan GroundDetail
        $marker = new GroundMarkers();
        $marker->id = $groundMarkersID;
        $marker->latitude = $request->latitude;
        $marker->longitude = $request->longitude;
        $marker->ground_detail_id = $information->id;
        $marker->save();


        $groundsID = IdGenerator::generate([
            'table' => 'grounds',
            'length' => 8,
            'prefix' => 'G-',
        ]);
        // Membuat Ground dengan marker_id dari marker yang baru saja disimpan
        $ground = new Ground();
        $ground->id = $groundsID;
        $ground->coordinates = $request->coordinates;
        $ground->marker_id = $marker->id; // Menggunakan ID yang dihasilkan untuk marker_id
        $ground->save();

        // Mengembalikan response
        return response()->json(['message' => 'Ground saved successfully!'], 201);
    }
}
