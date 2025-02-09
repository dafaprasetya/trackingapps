<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Waypoint;
use Illuminate\Http\Request;

class WaypointController extends Controller
{
    function makeWaypoint(Request $request) {
        $waypoint = new Waypoint();
        $waypoint->routeid = $request->routeid;
    }
}
