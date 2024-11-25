<?php

namespace App\Http\Controllers;

use App\Models\GroundDetails;

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

        // Kirim data ke view
        return view('dashboard', compact('groundData'));
    }
}
