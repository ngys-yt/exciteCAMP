<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Facades\App\User;
use Facades\App\Post;
use Facades\App\Like;
use Facades\App\Follow;
use Facades\App\Follower;



class exciteCampController extends Controller
{
    public function createProfile(Request $request){
        // storeメソッド⇨保存先指定
        $cover = $request->file('cover')->store('public/profile_cover');
        $cover = str_replace('public','/storage',$cover);  // $cover内 の /public を /storage に置換
        $image = $request->file('image')->store('public/profile_image');
        $image = str_replace('public','/storage',$image);
        User::createProfile(
            $cover,
            $image,
            $request->get('name'),
            $request->get('profile'),
            $request->get('twitter'),
            $request->get('instagram'),
            $request->get('facebook'),
            $request->get('youtube')
        );

        return redirect()->route('mypage');
    }

    public function profileDetail($id){
        $user = User::getProfile($id);

        return view('profile.profile_detail')->with('user',$user);
    }

    public function createPost(Request $request){
        $category = $request->get('category');
        $kind_1 = $request->get('kind_1');
        $kind_2 = $request->get('kind_2');
        return view('post.create_post',compact('category','kind_1','kind_2'));
    }

    public function sendPost(Request $request){
        $photo = $request->file('photo')->store('public/post_photo');
        $photo = str_replace('public','/storage',$photo);
        $category = $request->get('category');
        $kind_1 = $request->get('kind_1');
        $kind_2 = $request->get('kind_2');
        $title = $request->get('title');
        $content = $request->get('content');

        $id = Post::sendPost(
            $photo,
            $category,
            $kind_1,
            $kind_2,
            $title,
            $content
        );

        return redirect()->route('post_detail', ['id' => $id]); // [] パラメーター
    }

    public function postDetail($id){
        if($post = Post::find($id)){
            $user = Post::find($id)->user;
            $like = Auth::user()->like()->where('post_ids','like', '%,'.$id.',%')->exists();
            return view('post.post_detail',compact('post','user','like'));
        }

        return redirect()->back();
    }

    public function like(Request $request){
        Like::likeToggle($request->get('post_id'));

        // 投稿詳細を開き直す
        return redirect()->route('post_detail', ['id' => $request->get('post_id')]);
    }

    public function follow(Request $request){
        Follow::followToggle($request->get('user_id'));
        // Follower::followerToggle($request->get('user_id'));
        // プロフィール画面を開き直す
        return redirect()->route('profile_detail', ['id' => $request->get('follow_id')]);
    }

    public function campList(){
        $id_photo = Post::getCamp();
        return view('post.camp_list')->with('id_photo',$id_photo);
    }

    public function foodList(){
        $id_photo = Post::getFood();
        return view('post.food_list')->with('id_photo',$id_photo);
    }

    public function gearList(){
        $id_photo = Post::getGear();
        return view('post.gear_list')->with('id_photo',$id_photo);
    }


}
