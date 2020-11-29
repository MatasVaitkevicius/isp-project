<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override redirect after authentication
     *
     * @return string
     */
    protected function redirectPath()
    {
        if (auth()->user()->user_role == User::ROLE_ADMIN) {
            return RouteServiceProvider::ADMIN;
        } elseif (auth()->user()->user_role == User::ROLE_WORKER) {
            return RouteServiceProvider::WORKER;
        } elseif (auth()->user()->user_role == User::ROLE_BUYER) {
            return RouteServiceProvider::BUYER;
        } elseif (auth()->user()->user_role == User::ROLE_SELLER) {
            return RouteServiceProvider::SELLER;
        }
    }
}
