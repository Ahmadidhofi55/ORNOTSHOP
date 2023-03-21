<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password'=> 'required'
        ]);
        $input = $request->all();
        if (auth()->attempt(array('email'=> $input['email'],'password'=> $input['password']))) {
            if (auth()->user()->is_admin == 1) {
                Alert::success('Success', 'Login successful');
                return redirect()->route('admin.home');
            } else {
                Alert::success('Success', 'Login successful');
                return redirect()->route('home');
            }

        } else {
            Alert::error('error', 'Login failed or password is incorrect or does not exist');
            return redirect()->route('login')->with('email atau password salah');
        }

    }

}
