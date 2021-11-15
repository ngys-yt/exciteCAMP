<div>
    @php
        if(request()->get('1')){
            $users = Auth::user()->follows()->select('follow_ids')->get();
        }elseif(request()->get('2')){
            $users = Auth::user()->followers()->select('follower_ids')->get();
        }
        $user = explode("," ,$users);
        dd($user);
        // echo $users;
    @endphp
    {{-- @foreach ($user as $userName)
        <a href="{{ route('plofile_detail', ['id'=>$userName]) }}">
            <img src="{{ $post->photo }}" alt="" style="width: 100px">
        </a>
    @endforeach --}}
</div>