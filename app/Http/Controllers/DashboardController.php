<?php

namespace App\Http\Controllers;

use App\Models\GroundDetails;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil jumlah data berdasarkan tipe_tanah_id
        $tanahBengkokCount = GroundDetails::where('tipe_tanah_id', 'TG-000001')->count();
        $tanahKhasDesaCount = GroundDetails::where('tipe_tanah_id', 'TG-000002')->count();
        $tanahWakafCount = GroundDetails::where('tipe_tanah_id', 'TG-000003')->count();

        // Siapkan data untuk chart
        $groundData = [
            'labels' => ['Tanah Bengkok', 'Tanah Khas Desa', 'Tanah Wakaf'],
            'data' => [$tanahBengkokCount, $tanahKhasDesaCount, $tanahWakafCount],
        ];

        // Ambil jumlah data berdasarkan status_kepemilikan_id
        $pemerintahCount = GroundDetails::where('status_kepemilikan_id', 'SK-00001')->count();
        $peroranganCount = GroundDetails::where('status_kepemilikan_id', 'SK-00002')->count();
        $kelurahanCount = GroundDetails::where('status_kepemilikan_id', 'SK-00003')->count();

        // Siapkan data untuk chart status kepemilikan
        $ownershipData = [
            'labels' => ['Pemerintah', 'Perorangan', 'Kelurahan'],
            'data' => [$pemerintahCount, $peroranganCount, $kelurahanCount],
        ];

        // Ambil jumlah data berdasarkan status_tanah_id
        $disewakanCount = GroundDetails::where('status_tanah_id', 'ST-00001')->count();
        $tersewaCount = GroundDetails::where('status_tanah_id', 'ST-00002')->count();

        // Siapkan data untuk chart status kepemilikan
        $statusData = [
            'labels' => ['Disewakan', 'Tersewa'],
            'data' => [$disewakanCount, $tersewaCount],
        ];

        $currentUser = Auth::user()->username;

        // Kirim data ke view
        return view('dashboard', compact('groundData', 'ownershipData', 'statusData', 'currentUser'));
    }
}
