<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function checkRadius($asallat, $asallong, $tujuanlat, $tujuanlong) {
        $radius = 30;

        $asallat = deg2rad($asallat);
        $asallong = deg2rad($asallong);
        $tujuanlat = deg2rad($tujuanlat);
        $tujuanlong = deg2rad($tujuanlong);

        $dlat = $tujuanlat - $asallat;
        $dlon = $tujuanlong - $asallong;

        // Rumus Haversine
        $a = sin($dlat / 2) * sin($dlat / 2) + cos($asallat) * cos($tujuanlat) * sin($dlon / 2) * sin($dlon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $radius_of_earth = 6371000;
        $distance = $radius_of_earth * $c;

        $keterangan = ($distance > $radius) ? "lebih dari {$radius}m" : "dalam radius {$radius}m";

        return [
            'distance' => $distance,
            'keterangan' => $keterangan
        ];
    }
    function startLocation(Request $request) {
        $routes = new Route();
        $routes->userid = $request->userid;
        $routes->latitude = $request->latitude;
        $routes->longitude = $request->longitude;
        $routes->last_lat = $request->last_long;
        $routes->directions = $request->directions;
        $routes->info = $request->info;
        $berhasil = $routes->save();
        if ($berhasil) {
            return response()->json([
                'success' => true,
                'message' => 'data berhasil ditambahkan'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Kesalahan Mohon Coba Lagi atau hubungi IT'
            ]);
        }
        // $routes->timestamps = $request->;
    }
}
