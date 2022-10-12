<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>

        <h1>Blog Name</h1>
        
        <a href='/posts/create'>create</a>
        
        <div class='posts'>
            @foreach($posts as $post)　<!-- コントローラで指定した変数$postsなので、$posts as $postとする -->
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h2><!-- $post->idはコレクションについて参照すればわかる。 -->
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                    <p class='body'>{{$post->body}}</p><!-- 取り出された変数$postのデータのbodyカラム。bodyは$postインスタンスのプロパティになっている。 -->
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        
        <h3>ログイン中のユーザー：{{ Auth::user()->name }}</h3>
        
        <div class="paginate">{{ $posts->links()}}</div>
        
        <div><!--質問ページへのリンク追加-->
            @foreach($questions as $question)
                <div>
                    <a href="https://teratail.com/questions/{{ $question['id'] }}">
                        {{ $question['title'] }}
                    </a>
                </div>    
            @endforeach
        </div>
        
        <script>
            function deletePost(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>

</x-app-layout>