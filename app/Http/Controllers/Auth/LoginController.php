<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Entrust;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function get_login()
    {
      return view('auth.login');
    }

    public function post_login()
    {
      $username = request()->username;
      $password = request()->password;
      $remember = request()->remember;

      if (Auth::attempt(['username' => $username, 'password' => $password], $remember)) {
        if (Auth::viaRemember()) {
          if (Entrust::hasRole('root')) {
            return redirect()->route('cloud_index');
          } else {
            return redirect()->route('ekstrakurikuler_index');
          }
        }
        if (Entrust::hasRole('root')) {
          return redirect()->route('cloud_index');
        } else {
          return redirect()->route('ekstrakurikuler_index');
        }
      } else {
        $message = 'Username atau Password Tidak Sesuai';
        alert()->error($message, 'Login')->persistent('Tutup');
        return redirect()->route('get_login')->withErrors($message);
      }
    }
}
