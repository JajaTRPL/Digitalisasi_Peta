<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundDetails;
use App\Models\GroundMarkers;
use App\Models\PhotoGround;
use App\Models\SertificateGround;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\StatusKepemilikan;
use App\Models\StatusTanah;
use App\Models\TipeTanah;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GroundController extends Controller
{
    public function showData(){
        $dataGround = DB::table('ground_details')
        ->join('ground_markers', 'ground_details.id', '=', 'ground_markers.ground_detail_id')
        ->join('grounds', 'ground_markers.id', '=', 'grounds.marker_id')
        ->join('users', 'ground_details.added_by', '=', 'users.id')
        ->select('ground_details.id as ground_detail_id', 'ground_details.nama_asset', 'ground_details.updated_at', 'users.name as added_by_name')
        ->get();

        $photo = PhotoGround::all();

        return view('ManageGround', compact('dataGround', 'photo'));
    }

    public function create(){
        $statusKepemilikan = StatusKepemilikan::all();
        $statusTanah = StatusTanah::all();
        $tipeTanah = TipeTanah::all();


        return view('AddGround', compact('statusKepemilikan', 'statusTanah', 'tipeTanah'));
    }

    public function store(Request $request){
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
            'foto_tanah' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);


        $groundDetailsID = IdGenerator::generate([
            'table' => 'ground_details',
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
        $information->added_by = $currentUserID;
        $information->updated_by = $currentUserID;
        $information->save();

        $photoGroundID = IdGenerator::generate([
            'table' => 'ground_photos',
            'length' => 8,
            'prefix' => 'PG-',
        ]);

        if ($request->hasFile('foto_tanah')) {
            $filenameWithExt = $request->file('foto_tanah')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_tanah')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $photoNameSimpan = "{$basename}.{$extension}";
            $path = $request->file('foto_tanah')->storeAs('ground_image', $photoNameSimpan);
        }

        $photoGround = new PhotoGround();
        $photoGround->id = $photoGroundID;
        $name = $request->file('foto_tanah')->getClientOriginalName();
        $photoGround->size = $request->file('foto_tanah')->getSize();
        $photoGround->name = $photoNameSimpan;
        $photoGround->ground_detail_id = $information->id;
        $photoGround->save();

        $sertificateGroundID = IdGenerator::generate([
            'table' => 'ground_certificates',
            'length' => 8,
            'prefix' => 'SG-',
        ]);

        if ($request->hasFile('sertifikat')) {
            $filenameWithExt = $request->file('sertifikat')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('sertifikat')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $sertifNameSimpan = "{$basename}.{$extension}";
            $path = $request->file('sertifikat')->storeAs('ground_sertificate', $sertifNameSimpan);
        }

        $sertificateGround = new SertificateGround();
        $sertificateGround->id = $sertificateGroundID;
        $sertificateGround->size = $request->file('sertifikat')->getSize();
        $sertificateGround->name = $sertifNameSimpan;
        $sertificateGround->ground_detail_id = $information->id;
        $sertificateGround->save();

        $groundMarkersID = IdGenerator::generate([
            'table' => 'ground_markers',
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

    public function edit($id){
        $dataGround = DB::table('ground_details')
        ->join('ground_markers', 'ground_details.id', '=', 'ground_markers.ground_detail_id')
        ->join('grounds', 'ground_markers.id', '=', 'grounds.marker_id')
        ->select('ground_details.*', 'ground_markers.*', 'grounds.*')
        ->where('ground_details.id', $id)
        ->first();

        $statusKepemilikan = DB::table('status_kepemilikan')->get();
        $statusTanah = DB::table('status_tanah')->get();
        $tipeTanah = DB::table('tipe_tanah')->get();

        $dataGroundCoordinate = DB::table('ground_details')
        ->join('ground_markers', 'ground_details.id', '=', 'ground_markers.ground_detail_id')
        ->join('grounds', 'ground_markers.id', '=', 'grounds.marker_id')
        ->select('ground_markers.latitude', 'ground_markers.longitude','grounds.coordinates')
        ->where('ground_details.id', $id)
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

        dd($request->all());

        $request->validate([
            'nama_asset' => 'required|string',
            'status_kepemilikan' => 'required|string',
            'status_tanah' => 'required|string',
            'alamat' => 'required|string',
            'tipe_tanah' => 'required|string',
            'luas_asset' => 'required|numeric',
        ]);

        $groundDetail = GroundDetails::findOrFail($id);
        $groundDetail->nama_asset = $request->nama_asset;
        $groundDetail->alamat = $request->alamat;
        $groundDetail->status_kepemilikan_id = $request->status_kepemilikan;
        $groundDetail->status_tanah_id = $request->status_tanah;
        $groundDetail->luas_asset = $request->luas_asset;
        $groundDetail->tipe_tanah_id = $request->tipe_tanah;
        $groundDetail->save();

        return redirect()->back()->with('success', 'Data ground berhasil diperbarui');

        // 'foto_tanah' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            // 'sertifikat' => 'required|file|mimes:pdf,doc,docx|max:5120',


            // 'coordinates' => 'required|json',
            // 'latitude' => 'required|numeric',
            // 'longitude' => 'required|numeric',

        // $photoGround = PhotoGround::findOrFail($id);

        // if ($request->hasFile('foto_tanah')) {
        //     // Baca isi file sebagai binary dan simpan ke database
        //     $groundDetail->foto_tanah = file_get_contents($request->file('foto_tanah')->getRealPath());
        // }

        // // Update sertifikat jika ada file baru
        // if ($request->hasFile('sertifikat')) {
        //     // Baca isi file sebagai binary dan simpan ke database
        //     $groundDetail->sertifikat = file_get_contents($request->file('sertifikat')->getRealPath());
        // }


        // $groundMarker = GroundMarkers::findOrFail($id);
        // $groundMarker->longitude = $request->longitude;
        // $groundMarker->latitude = $request->latitude;
        // $groundMarker->save();

        // $ground = Ground::findOrFail($id);
        // $ground->coordinates = $request->coordinates;
        // $ground->save();

    }

    public function destroy($id){
        $ground = GroundDetails::find($id);

        $photoGround = DB::table('ground_details')
        ->join('ground_photos', 'ground_details.id', '=', 'ground_photos.ground_detail_id')
        ->select('ground_photos.*')
        ->where('ground_details.id', $id)
        ->get();

        $certificateGround = DB::table('ground_details')
        ->join('ground_certificates', 'ground_details.id', '=', 'ground_certificates.ground_detail_id')
        ->select('ground_certificates.*')
        ->where('ground_details.id', $id)
        ->get();

        foreach ($photoGround as $photo) {
            Storage::delete('ground_image/' . $photo->name);
        }

        // Hapus setiap file sertifikat dari storage
        foreach ($certificateGround as $certificate) {
            Storage::delete('ground_sertificate/' . $certificate->name);
        }

        $ground ->delete();

        return redirect('/ManageGround')->with('pesan', 'Data ground berhasil di Hapus');
    }
}
