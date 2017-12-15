<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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

    //use AuthenticatesUsers;

    protected $redirectTo = '/creditos';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(request $request)
    {
        if($request->isMethod('post')){
            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'estado' => 1])) {
                return redirect("/creditos");
            }
        }
        return view("auth.login");
    }
    public function logout(){
        Auth::logout();
        return redirect("/");
    }

}
