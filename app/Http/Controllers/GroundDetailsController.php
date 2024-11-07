<?php

namespace App\Http\Controllers;

use App\Models\Ground;
use App\Models\GroundDetails;
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

    public function destroy($id){
        $ground = GroundDetails::find($id);

        $ground ->delete();

        return redirect('/ManageGround')->with('pesan', 'Data ground berhasil di Hapus');
    }
}
