<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundAddress;
use App\Models\GroundDetails;
use App\Models\GroundMarkers;
use App\Models\PhotoGround;
use App\Models\SertificateGround;
use App\Models\StatusKepemilikan;
use App\Models\StatusTanah;
use App\Models\TipeTanah;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class GroundController extends Controller
{
    public function showData()
    {
        $dataGround = DB::table('ground_details')
            ->join('ground_markers', 'ground_details.id', '=', 'ground_markers.ground_detail_id')
            ->join('grounds', 'ground_markers.id', '=', 'grounds.marker_id')
            ->join('users', 'ground_details.added_by', '=', 'users.id')
            ->select('ground_details.id as ground_detail_id', 'ground_details.nama_asset', 'ground_details.updated_at', 'users.username as added_by_name', 'ground_markers.latitude', 'ground_markers.longitude')
            ->get();

        $photo = PhotoGround::all();

        $currentUser = Auth::user()->username;

        $groundJson = DB::table('ground_details')
            ->join('ground_markers', 'ground_details.id', '=', 'ground_markers.ground_detail_id')
            ->join('grounds', 'ground_markers.id', '=', 'grounds.marker_id')
            ->join('users', 'ground_details.added_by', '=', 'users.id')
            ->join('status_tanah', 'ground_details.status_tanah_id', '=', 'status_tanah.id')
            ->join('status_kepemilikan', 'ground_details.status_kepemilikan_id', '=', 'status_kepemilikan.id')
            ->join('tipe_tanah', 'ground_details.tipe_tanah_id', '=', 'tipe_tanah.id')
            ->join('ground_photos', 'ground_details.id', '=', 'ground_photos.ground_detail_id')
            ->join('ground_certificates', 'ground_details.id', '=', 'ground_certificates.ground_detail_id')
            ->join('ground_address', 'ground_address.id', '=', 'ground_details.alamat_id')
            ->select('ground_details.id as ground_detail_id', 'ground_details.id', 'ground_address.detail_alamat as alamat', 'ground_photos.name as photo', 'ground_certificates.name as certificate', 'ground_details.nama_asset', 'ground_details.luas_asset', 'nama_status_kepemilikan', 'nama_tipe_tanah', 'ground_details.updated_at', 'users.username as added_by_name', 'ground_markers.latitude', 'ground_markers.longitude')
            ->get();
        $groundJson = json_encode($groundJson);

        return view('ManageGround', compact('dataGround', 'photo', 'currentUser', 'groundJson'));
    }

    public function create()
    {
        $statusKepemilikan = StatusKepemilikan::all();
        $statusTanah = StatusTanah::all();
        $tipeTanah = TipeTanah::all();
        $currentUser = Auth::user()->username;

        return view('AddGround', compact('statusKepemilikan', 'statusTanah', 'tipeTanah', 'currentUser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'coordinates' => 'required|json',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'nama_asset' => 'required|string',
            'status_kepemilikan' => 'required|string',
            'status_tanah' => 'required|string',
            'detail_alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'padukuhan' => 'required|string',
            'tipe_tanah' => 'required|string',
            'luas_asset' => 'required|numeric',
            'foto_tanah' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        DB::beginTransaction();

        try {
            $groundAddressID = IdGenerator::generate([
                'table' => 'ground_address',
                'length' => 8,
                'prefix' => 'GA-',
            ]);

            $groundAddress = new GroundAddress;
            $groundAddress->id = $groundAddressID;
            $groundAddress->detail_alamat = $request->detail_alamat;
            $groundAddress->rt = $request->rt;
            $groundAddress->rw = $request->rw;
            $groundAddress->padukuhan = $request->padukuhan;
            $groundAddress->save();

            $currentUserID = Auth::user()->id;

            $groundDetailsID = IdGenerator::generate([
                'table' => 'ground_details',
                'length' => 8,
                'prefix' => 'GD-',
            ]);

            $information = new GroundDetails;
            $information->id = $groundDetailsID;
            $information->nama_asset = $request->nama_asset;
            $information->alamat_id = $groundAddressID;
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
                $extension = $request->file('foto_tanah')->getClientOriginalExtension();
                $basename = uniqid().time();
                $photoNameSimpan = "{$basename}.{$extension}";
                $request->file('foto_tanah')->storeAs('ground_image', $photoNameSimpan);
            }

            $photoGround = new PhotoGround;
            $photoGround->id = $photoGroundID;
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
                $extension = $request->file('sertifikat')->getClientOriginalExtension();
                $basename = uniqid().time();
                $sertifNameSimpan = "{$basename}.{$extension}";
                $request->file('sertifikat')->storeAs('ground_sertificate', $sertifNameSimpan);
            }

            $sertificateGround = new SertificateGround;
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
            $marker = new GroundMarkers;
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

            $ground = new Ground;
            $ground->id = $groundsID;
            $ground->coordinates = $request->coordinates;
            $ground->marker_id = $marker->id; // Memakai id yang dihasilkan dari id generator
            $ground->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            throw new HttpResponseException(response()->json(['error' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.'], 500));
        }
    }

    public function edit($id)
    {
        $dataGround = DB::table('ground_details')
            ->join('ground_markers', 'ground_details.id', '=', 'ground_markers.ground_detail_id')
            ->join('grounds', 'ground_markers.id', '=', 'grounds.marker_id')
            ->select('ground_details.*', 'ground_markers.*', 'grounds.*', 'ground_details.id as ground_detail_id')
            ->where('ground_details.id', $id)
            ->first();

        $statusKepemilikan = DB::table('status_kepemilikan')->get();
        $statusTanah = DB::table('status_tanah')->get();
        $tipeTanah = DB::table('tipe_tanah')->get();

        $photoGround = DB::table('ground_details')
            ->join('ground_photos', 'ground_details.id', '=', 'ground_photos.ground_detail_id')
            ->select('ground_photos.*')
            ->where('ground_details.id', $id)
            ->first();

        $sertifikatGround = DB::table('ground_details')
            ->join('ground_certificates', 'ground_details.id', '=', 'ground_certificates.ground_detail_id')
            ->select('ground_certificates.*')
            ->where('ground_details.id', $id)
            ->first();

        $alamatGround = DB::table('ground_address')
            ->join('ground_details', 'ground_address.id', '=', 'ground_details.alamat_id')
            ->select('ground_address.*')
            ->where('ground_details.id', $id)
            ->first();

        $dataGroundCoordinate = DB::table('ground_details')
            ->join('ground_markers', 'ground_details.id', '=', 'ground_markers.ground_detail_id')
            ->join('grounds', 'ground_markers.id', '=', 'grounds.marker_id')
            ->select('ground_markers.latitude', 'ground_markers.longitude', 'grounds.coordinates')
            ->where('ground_details.id', $id)
            ->get();

        $polygonDataGround = [
            'type' => 'FeatureCollection',
            'features' => $dataGroundCoordinate->map(function ($dataGroundCoordinate) {
                return json_decode($dataGroundCoordinate->coordinates);
            }),
        ];

        $markerDataGround = [
            'type' => 'FeatureCollectioin',
            'features' => $dataGroundCoordinate->map(function ($dataGroundCoordinate) {
                return [
                    'type' => 'Feature',
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [(float) $dataGroundCoordinate->longitude, (float) $dataGroundCoordinate->latitude],
                    ],
                ];
            }),
        ];

        $polygon = json_encode($polygonDataGround);
        $marker = json_encode($markerDataGround);

        return view('EditGround', compact('dataGround', 'statusKepemilikan', 'statusTanah', 'tipeTanah', 'polygon', 'marker', 'photoGround', 'sertifikatGround', 'alamatGround'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_asset' => 'required|string',
            'status_kepemilikan' => 'required|string',
            'status_tanah' => 'required|string',
            'detail_alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'padukuhan' => 'required|string',
            'tipe_tanah' => 'required|string',
            'luas_asset' => 'required|numeric',
            'coordinates' => 'required|json',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'foto_tanah' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'sertifikat' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        DB::beginTransaction();

        try {
            $groundDetail = GroundDetails::findOrFail($id);

            $groundAddress = GroundAddress::findOrFail($groundDetail->alamat_id);
            $groundAddress->detail_alamat = $request->detail_alamat;
            $groundAddress->rt = $request->rt;
            $groundAddress->rw = $request->rw;
            $groundAddress->padukuhan = $request->padukuhan;
            $groundAddress->save();

            $groundDetail->nama_asset = $request->nama_asset;
            $groundDetail->status_kepemilikan_id = $request->status_kepemilikan;
            $groundDetail->status_tanah_id = $request->status_tanah;
            $groundDetail->luas_asset = $request->luas_asset;
            $groundDetail->tipe_tanah_id = $request->tipe_tanah;
            $groundDetail->save();

            $photoGround = PhotoGround::where('ground_detail_id', $id)->firstOrFail();

            if ($request->hasFile('foto_tanah')) {
                $destination = 'ground_image/'.$photoGround->name;

                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                }

                $extension = $request->file('foto_tanah')->getClientOriginalExtension();
                $basename = uniqid().time();
                $photoNameSimpan = "{$basename}.{$extension}";
                $request->file('foto_tanah')->storeAs('ground_image', $photoNameSimpan);
                $photoGround->name = $photoNameSimpan;
                $photoGround->save();
            }

            $sertifikatGround = SertificateGround::where('ground_detail_id', $id)->firstOrFail();

            if ($request->hasFile('sertifikat')) {
                $destination = 'ground_sertificate/'.$sertifikatGround->name;

                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                }

                $extension = $request->file('sertifikat')->getClientOriginalExtension();
                $basename = uniqid().time();
                $sertifikatNameSimpan = "{$basename}.{$extension}";
                $request->file('sertifikat')->storeAs('ground_sertificate', $sertifikatNameSimpan);
                $sertifikatGround->name = $sertifikatNameSimpan;
                $sertifikatGround->save();
            }

            $groundMarker = GroundMarkers::where('ground_detail_id', $id)->firstOrFail();
            $groundMarker->longitude = $request->longitude;
            $groundMarker->latitude = $request->latitude;
            $groundMarker->save();

            $ground = DB::table('grounds as g')
                ->join('ground_markers as gm', 'g.marker_id', '=', 'gm.id')
                ->join('ground_details as gd', 'gm.ground_detail_id', '=', 'gd.id')
                ->where('gm.id', $groundMarker->id) // Replace $markerId with your marker_id
                ->where('gd.id', $id) // Replace $groundDetailId with your ground_detail_id
                ->select('g.*')
                ->first();

            $ground = Ground::find($ground->id)->firstOrFail();
            $ground->coordinates = $request->coordinates;
            $ground->save();

            DB::commit();

            session()->flash('success', 'Data berhasil diperbarui.');

            return redirect()->route('ManageGround');
        } catch (\Exception $error) {
            DB::rollBack();

            // Menggunakan session flash untuk pesan kesalahan
            session()->flash('error', 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.');

            return redirect()->route('ManageGround');
        }

    }

    public function destroy($id)
    {
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
            Storage::delete('ground_image/'.$photo->name);
        }

        // Hapus setiap file sertifikat dari storage
        foreach ($certificateGround as $certificate) {
            Storage::delete('ground_sertificate/'.$certificate->name);
        }

        $ground->delete();

        return redirect('/ManageGround')->with('pesan', 'Data ground berhasil di Hapus');
    }
}
