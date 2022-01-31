<?php

namespace App\Http\Controllers;

use Facades\App\User;
use Facades\App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\exciteCampRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(exciteCampRequest $request){

        User::createUser($request->get('email'));

        return redirect()->route('register_sent');
    }

    public function verifyToken($token){
        if($user = User::where('token',$token)->first()){
            session()->put('register_user',$user);

            return redirect()->route('register_main');
        }
        
        abort(403);
    }

    public function registerMain(Request $request){
        User::register(
            $request->get('name'),
            $request->get('password')
        );

        session()->forget('register_user');

        return redirect()->route('register_complete');
    }

    public function login(Request $request){
        $credentials = $request->only(['email','password']);

        if(Auth::attempt($credentials)){
            $camps = Post::where('category', 'camp')->get();
            $foods = Post::where('category', 'food')->get();
            $gears = Post::where('category', 'gear')->get();
            return view('top', compact('camps','foods','gears'));
        }

        return redirect()->back()->with('reason','fail');
    }

    public function logout(){
        Auth::logout();

        return redirect()->to('/');
    }
}
