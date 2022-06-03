<?php

namespace App\Http\Controllers;

use Facades\App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;


class AuthController extends Controller
{
    
    public function contact(Request $request)  //メールの自動送信設定
    {
        $email = $request->get('email');
        $name = $request->get('name');

        if(User::where('email', $email)->exists()){
            return back()->with('email_exists', '入力したメールアドレスは既に使用されています。');
        }
        if(User::where('name', $name)->exists()){
            return back()->with('name_exists', '入力した名前は既に使用されています。');
        }

        $token = User::createUser($email, $name);

        Mail::send('auth.emails_text', ["token" => $token], function($token) use ($email){
                $token   ->to($email)
                        ->subject('【 excite CAMP 】');
        });

        return redirect()->route('emails_complete');
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
            $request->get('password')
        );

        session()->forget('register_user');

        return redirect()->route('login');
    }

    public function login(Request $request){
        $credentials = $request->only(['email','password']);

        if(Auth::attempt($credentials)){
            
            return redirect()->route('top');
        }

        return redirect()->back()->with('reason','fail');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('welcome');
    }
}
