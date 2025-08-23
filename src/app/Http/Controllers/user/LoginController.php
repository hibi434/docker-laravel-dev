<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(){
        return view('user.login');
    }
    public function check(Request $request){
        $user=$request->only('name','password');
        if(Auth::attempt($user)){
            $request->session()->regenerate();
            return redirect(route('user_home'));
        }
        return back()->with(['message'=>'アカウントまたはパスワードが間違っています']);
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect(route('login'));
     }
}
