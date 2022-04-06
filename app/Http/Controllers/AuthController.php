<?php

namespace App\Http\Controllers;

use Facades\App\User;
use Illuminate\Http\Request;
use App\Http\Requests\exciteCampRequest;
use Illuminate\Support\Facades\Auth;
use Mail;


class AuthController extends Controller
{
    public function register(exciteCampRequest $request){

        User::createUser($request->get('email'));

        return redirect()->route('register_sent');
    }

    public function contact(Request $request)  //メールの自動送信設定
    {
        $email = $request->get('email');
        
        Mail::send('auth.emails_text', [], function($data) use ($email){
                $data   ->to($email)
                        ->subject('送信メールの表題');
        });

        return back()->withInput($request->only(['name']))
                        ->with('sent', '送信完了しました。');  //送信完了を表示
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
            
            return redirect()->route('top');
        }

        return redirect()->back()->with('reason','fail');
    }

    public function logout(){
        Auth::logout();

        return redirect()->to('/');
    }
}
