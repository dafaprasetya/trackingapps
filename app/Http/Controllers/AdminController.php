<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function test() {
        return view('admin/test');
    }
    public function getToken(Request $request) {
        // $token = $request->user()->createToken($request->token_name);
        $token = $request->user()->createToken('API Token');
        return ['token' => $token->plainTextToken];
    }
    public function sanctumTest(Request $request) {
        // $token = $request->user()->createToken($request->token_name);
        
        $token = 'kamu berhasil';
        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }
}
