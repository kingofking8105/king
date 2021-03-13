<?php
namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login(Request $request)
    {
        $user= User::where('email',$request->email)->first();
        Auth::login($user, true);
       // $2y$10$QqLeg5yNvKPSGjNuf19.l.DreaxzegT7lw/PBwz7jpBZ4Y3fPVYP.
        //$2y$10$INBEX1H9QebM3dqOsjN1ee5LOF6jZhfbAR4HyCO8uGaUPyLd8eqUG
//        $a= $this->guard()->attempt(
//            $this->credentials($request), $request->filled('remember')
//        );

        return redirect('admin/home');
    }
    public function logout(Request $request)
    {

        return redirect('admin/home');
    }
}
