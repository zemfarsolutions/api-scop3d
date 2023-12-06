<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function check(Request $request){
        $validate = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
        ],[
            'username' => 'Please provide username',
            'password' => 'Please provide password'
        ]);
        if($validate->fails()){
            return back()
                ->withErrors($validate)
                ->withInput();
        }
        else{
            $credentials =[
                'email' => $request->username,
                'password' => $request->password
            ];
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->intended('/telescope');
            }
            else{
                return back()->with('error','Invalid Credentials');
            }
        }
    }

    public function destroy(){
        Auth::logout();
        return view('auth.login');
    }
}
