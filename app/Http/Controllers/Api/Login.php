<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResources;
use App\Models\User;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('nik', $request->nik)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['success' => false], 401);
        }
        $user->last_seen = Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s');
        $user->save();

        // Generate token
        // $token = $user->createToken('API Token')->plainTextToken;

        return new UserResources($user);
    }

}
