@extends('header')
@section('camp_list')
<body>
    <div class="mx-auto" style="width: 100%">
        <h1>投稿詳細</h1>
        <div>
            <a href="{{ route('profile_detail',['id' => $user->id]) }}">{{ $user->name }}</a>
        </div>
        <div><img src="{{ $post->photo }}" alt="" style="width: 300px"></div>
        <div>カテゴリー：{{ $post->category }}</div>
        <div>料理名：{{ $post->kind_1 }}</div>
        <div>使用アイテム：{{ $post->kind_2 }}</div>
        <div>タイトル：{{ $post->title }}</div>
        <div>内容：{{ $post->content }}</div>
        <div>
            いいね
            {{-- 自分のページには表示しない、いいね件数実装する --}}
            @if($like)
                <form action="{{ route('like') }}" name="like" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <span class="heart" onclick="document.like.submit()">
                        <i class="fas fa-heart" id="like-{{ $post->id }}"></i>
                    </span>
                </form>
            @else
                <form action="{{ route('like') }}" name="like" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <span class="heart" onclick="document.like.submit()">
                        <i class="far fa-heart" id="like-{{ $post->id }}"></i>
                    </span>
                </form>
                
            @endif
        </div>
    </div>
    {{-- <script>
        $(function () {
            $("#like").on("click", function () {
                post_id = $(this).attr("post_id");
                like_status = $(this).attr("like_status");
                click_hart = $(this);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    type: "POST",
                    url: "/post/liks",
                    data: "post_id": post_id
                }) // ここまで.ajax()

                // 処理成功
                .done(function (data) {
                    if(date == false){
                        //クリックしたタグのステータスを変更
                        click_hart.attr("like_status", "1")
                        //クリックしたタグの子の要素を変更(表示されているハートの模様を書き換える)
                        click_hart.children().attr("class", "fas fa-heart")
                    }else{
                        click_hart.attr("like_status", "0")
                        click_hart.children().attr("class", "far fa-heart")
                    }
                })
                // 処理失敗
                .fail(function (data) {
                    alert('いいね処理失敗');
                })
            }); // ここまで click function()
        });
    </script> --}}
</body>
@endsection



