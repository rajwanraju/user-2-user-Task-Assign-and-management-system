<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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

    protected function authenticated(Request $request, $user)
       {
           if($user->hasRole('superadmin')){
               return redirect('/super-admin/homePage');
           }
           else if($user->hasRole('admin')){
               return redirect('/admin/homePage');
           }
           else if($user->hasRole('TeamLeader')){
               return redirect('/teamLeader/homePage');
           }
           else if($user->hasRole('TeamMember')){
               return redirect('/teamMember/homePage');
           }

           else{
               return redirect('/');
           }
       }


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

    public function logout(Request $request)
  {
      $this->guard()->logout();
      $request->session()->invalidate();
      return redirect('/');
  }
}
