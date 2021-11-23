@extends('header')
@section('direct_message')
<h1>DM</h1>
<form action="{{ route('send_name') }}" method="GET">
    @csrf
    <input type="text" name="name"><input type="submit" value="検索">
</form>
<div class="container-fluid" style="height: 90%;">
    <div class="row" style="height: 90%;">
        <div class="col-4" style="border-style: double;">
            @if($message_partners)
                @foreach ($message_partners as $message_partner)
                    <form action="{{ route('message_content') }}" name="channel" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $message_partner->id }}"> 
                        <span class="channel" onclick="document.channel.submit()">
                            <div >
                                {{ $message_partner->name }}
                                <i class="fas fa-check-circle" id="channel-{{ $message_partner->id }}"></i>
                            </div>
                        </span>
                    </form>
                @endforeach
            @else
                <h2>やり取りしているユーザーはいません</h2>
            @endif
        </div>
        <div class="col-8" style="border-style: double;">
            <div class="scroll">
                <div id="scroll-inner">
                    {{-- redirectで受け取ったsession表示 --}}
                    @if(session('messages'))
                        @foreach (session('messages') as $message)
                            <li>{{ ($message->content) }}</li>
                        @endforeach
                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
