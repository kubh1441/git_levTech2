<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>

        <div class='posts'>
            @foreach($posts as $post)　<!-- コントローラで指定した変数$postsなので、$posts as $postとする -->
                <div class='post'>
                    <h2 class='title'><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h2><!-- $post->idはコレクションについて参照すればわかる。 -->
                    <p class='body'>{{$post->body}}</p><!-- 取り出された変数$postのデータのbodyカラム。bodyは$postインスタンスのプロパティになっている。 -->
                </div>
            @endforeach
        </div>
        <div class="paginate">{{ $posts->links()}}</div>
    </body>
</html>