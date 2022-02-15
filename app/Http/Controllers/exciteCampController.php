<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Facades\App\User;
use Facades\App\Post;
use Facades\App\Like;
use Facades\App\Follow;
use Facades\App\MessageChannel;
use Facades\App\Message;



class exciteCampController extends Controller
{
    public function top(){
        $camps = Post::where('category', 'camp')->get();
        $foods = Post::where('category', 'food')->get();
        $gears = Post::where('category', 'gear')->get();

        return view('top',compact('camps','foods','gears'));
    }

    public function createProfile(Request $request){
        // storeメソッド⇨保存先指定
        if($cover = $request->file('cover')){
            $cover = $request->file('cover')->store('public/profile_cover');
            $cover = str_replace('public','/storage',$cover);  // $cover内 の /public を /storage に置換
            $image = NULL;
        }elseif($image = $request->file('image')){
            $image = $request->file('image')->store('public/profile_image');
            $image = str_replace('public','/storage',$image);
            $cover = NULL;
        }elseif($cover && $image){
            $cover = $request->file('cover')->store('public/profile_cover');
            $cover = str_replace('public','/storage',$cover);  // $cover内 の /public を /storage に置換
            $image = $request->file('image')->store('public/profile_image');
            $image = str_replace('public','/storage',$image);
        }else{
            $cover = NULL;
            $image = NULL;
        }
        
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
        $follow = Auth::user()->follow()->where('follow_ids','like', '%,'.$id.',%')->exists();

        return view('profile.profile_detail',compact('user','follow'));
    }

    public function ffList($id){
        $follow_users = Follow::getFollowIds($id);
        $follower_users = Follow::getFollowerIds($id);
        if(!$follow_users){
            $follow_users = NULL;
        }elseif(!$follower_users){
            $follower_users = NULL;
        }

        return view('profile.ff_list',compact('follow_users','follower_users'));
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
            // ログインユーザーのLike()のpost_idsに$idがいるか、存在確認(exists)
            $like = Auth::user()->like()->where('post_ids','like', '%,'.$id.',%')->exists();
            
            // ユーザーがいいねしたpost_idがpost_idsにまとめて入っている
            // $post_ids = Like::pluck('post_ids');
            // $count = 0;
            // foreach($post_ids as $post_id){
            //     if(strpos($post_id, ",$id,") !== false){
            //         $count++;
            //     }
            // }

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
        // プロフィール画面を開き直す
        return redirect()->route('profile_detail', ['id' => $request->get('user_id')]);
    }

    public function campList(){
        $id_photo = Post::getCamp();
        return view('post.camp_list', compact('id_photo'));
    }

    public function foodList(){
        $id_photo = Post::getFood();
        return view('post.food_list', compact('id_photo'));
    }

    public function gearList(){
        $id_photo = Post::getGear();
        return view('post.gear_list', compact('id_photo'));
    }

    
    public function directMessage(){
        $channels = MessageChannel::getChannels();
        $message_partners = array();
        
        foreach($channels as $channel){
            if($channel->user_id_1 == Auth::id()){
                $channel_user = $channel->user_id_2;
            }elseif($channel->user_id_2 == Auth::id()){
                $channel_user = $channel->user_id_1;
            }
            
            $message_partners[] = User::where('id', $channel_user)->first();
        }
        
        return view('profile.direct_message', ['message_partners'=>$message_partners]);
    }
    
    public function messageContent(Request $request){
        $user_id = $request->get('user_id');
        MessageChannel::statusToggle($user_id);
        $messages = MessageChannel::getMessages($user_id);
        
        return redirect()->route('direct_message')->with(compact('user_id','messages'));
        // redirectはsessionとしてviewに渡される view側表示方法注意
    }
    
    public function sendMessage(Request $request){
        Message::setMessage($request->get('message_content'),$request->get('channel_id'));
        return redirect()->route('direct_message');
    }
    
    /******************************* DM検索機能 ************************************/ 

//     public function nameSeach(Request $request){
//          // フォローしているユーザーがいるか
//         if($ids= Auth::user()->follow()->value('follow_ids')){
//             // 検索結果取得
//             $key_word = $request->get('name');
//             // $follow_idsを配列にする
//             $follow_ids = explode("," ,$ids);
//             // フォローユーザーを取得
//             $follow_users = User::whereIn('id',$follow_ids)->get();
//             // follow_usersからkey_wordの部分一致のnameを取得(ない場合エラー返す)
//             foreach($follow_users as $follow_user){
//                 if($user = $follow_user->where('name', 'like', '%'.$key_word.'%')->first()){
//                     return view('profile.extract_user', ['user'=>$user]);
//                 }elseif($user === NULL){
//                     return view('profile.extract_user',['error'=>'そのユーザーはいません']);
//                 }
//             }
//         }else{
//             return view('profile.extract_user', ['error'=>'フォローユーザーがいません']);
//         }
//     }

//     public function extractUser(){
//         return view('profile.extract_user', ['user'=>NULL]);
//     }

//     public function newSendMessage(Request $request){
//         Message::setMessage($request->get('message_content'),$request->get('channel_id'));
//         return redirect()->route('extract_user');
//     }
    
//     public function newMessageContent(Request $request){
//         $user_id = $request->get('user_id');

//         if(
//             MessageChannel::where([
//                             ['user_id_1', Auth::id()],
//                             ['user_id_2', $user_id]
//                             ])->orWhere([
//                                 ['user_id_1', $user_id],
//                                 ['user_id_2', Auth::id()]
//                             ])->exists()
//             ){
//                 MessageChannel::statusToggle($user_id);
//                 $messages = MessageChannel::getMessages($user_id);

//                 return redirect()->route('extract_user')->with(compact('user_id','messages'));
//             }

//         $messages = NULL;

//         return redirect()->route('extract_user')->with(compact('user_id','messages'));
//         // redirectはsessionとしてviewに渡される view側表示方法注意
//     }
    /************************************************************************************/ 
}
