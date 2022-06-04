@extends('header')

@section('head')
<script src="{{ asset('/extract_user/map.js') }}"></script>

@endsection
    
@section('body')
    <div class="container-fluid" style="height: 100%;">
        <div class="row d-flex justify-content-center" style="height: 100%;">
            <div class="col-2" style="border-style: double; height: 90%;">
                @if($user)
                    <div class="d-flex flex-row">
                        <a href="{{ route('profile_detail',['id' => $user->id]) }}">プロフ</a>
                        <form action="{{ route('new_message_content') }}" name="channel" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                            <span class="channel" onclick="document.channel.submit()">
                                {{ $user->name }}
                            </span>
                        </form>
                    </div>
                @endif
            </div>
            <div class="col-4 chat" style="border-style: double; height: 90%;">
                <div class="overflow-auto" style="height: 85%; border-bottom-style: double;">
                    <div id="scroll">
                        @if(session('messages'))
                        @foreach (session('messages') as $message)
                            @if($message->user_id == Auth::id())
                                <div class="chat_text_right">
                                    {!! nl2br($message->content) !!}
                                </div>
                            @else
                                <figure class="chat_img_left">
                                    <img src="sample.png" alt="相手のアイコン画像" class="figure_img_left">
                                    <figcaption class="figure_img_name_left">
                                    相手の名前
                                    </figcaption>
                                </figure>
                                <div class="chat_text_left">
                                    {!! nl2br($message->content) !!}
                                </div>
                            @endif
                        @endforeach
                        @endif
                    </div>
                </div>
                @if(session('user_id'))
                <div class="chat-text">
                    <form action="{{ route('new_send_message') }}" method="post">
                        @csrf
                        <textarea name="message_content" cols="40" rows="3"></textarea>
                        <input type="hidden" name="channel_id" value="{{ session('user_id') }}">
                        <input type="submit" value="送信">
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        // // スクロール 常に一番下を表示
        // let target = document.getElementById('scroll');
        // target.scrollIntoView(false);
    </script>
@endsection
    