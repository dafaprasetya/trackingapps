<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Route;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    // protected function authenticated(Request $request, $user)
    // {
    //     $user->last_seen = Carbon::now()->format('Y-m-d H:i:s');
    //     $user->save();
    // }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function username()
    {
        return 'nik';
    }

    


    public function __construct()
    {

        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    
    
}
