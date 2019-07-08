<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Log;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/auth/check';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        $log = [
            'user_id' => $user->id,
            'name'  => 'Login',
            'description' => 'Masuk ke sistem'
        ];
        Log::create($log);
    }

    public function logout(Request $request)
    {
        $log = [
            'user_id' => $request->user()->id,
            'name'  => 'Logout',
            'description' => ' Keluar dari sistem'
        ];

        $this->guard()->logout();

        $request->session()->invalidate();

        Log::create($log);
        return $this->loggedOut($request) ?: redirect('/');
    }
}
