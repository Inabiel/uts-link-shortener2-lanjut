<?php

namespace App\Http\Controllers;

use App\Link;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class Auth extends Controller
{
    public function registerIndex(){
        return view('register');
    }

    public function loginIndex(){
        return view('login');
    }

    public function error_404(){
        return view('404');
    }

    public function register(Request $request){
        $validated = $request->validate(
            [
                'nama'=>'required|min:5|string|bail',
                'email'=>'required|min:5|email',
                'password'=>'required|min:8'
            ]
            );
            $user = User::create([
                'name'=>$validated['nama'],
                'email'=>$validated['email'],
                'password'=>Hash::make($validated['password'],[
                    'rounds'=> 10
                ]),
                'links_amount' => 0
            ]);
            if($user){
                return redirect()->route('home');
            }
    }

    public function login(Request $request){
        $validated = $request->validate(
            [
                'email'=>'required|min:5|email',
                'password'=>'required|min:8'
            ]
            );
        $user = User::firstWhere('email',$validated['email']);
        if(!$user){
            return redirect()->route('error_404');
        }
        if(!Hash::check($validated['password'], $user->password)){
            return redirect()->route('error_404');
        }
        session(
            ['is_login' => true,
            'id'=>$user->id,
            'nama' => $user->name,
            'email' => $user->email,
        ]);
        return redirect()->route('user');
    }

    public function getCurrentUser(Request $request){
        $data = array([
            "userID" =>  $request->session()->get('id'),
            "nama"=>  $request->session()->get('nama'),
            'email'=>  $request->session()->get('email'),
            'is_login' => $request->session()->get('is_login'),
        ]);
        $links = Link::where('userID', $data[0]['userID'])->paginate(10);
        return view('dashboard')->with(
            [
                'data'=>$data,
                'links'=>$links,
            ]);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('home');
    }
}
