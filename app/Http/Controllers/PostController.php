<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;//Models内のPostクラスをインポート

class PostController extends Controller
{
    /**
    * Post一覧を表示する
    * 
    * @param Post Postモデル
    * @return array Postモデルリスト
    */
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用
    {
        //ルートファイルweb.phpでこのコントローラのindexをまず呼び出している。
        //コントローラからはビューを返したい。
        //ただし、withメソッドを使ってpostsテーブルのデータを渡す。公式リファレンスhttps://readouble.com/laravel/9.x/ja/views.html
        return view('posts.index')->with(['posts' => $post->get()]);//これで'posts'という変数名でデータをビューに渡すことができる。
        //上記の変数'posts'にはコレクションと呼ばれる複数のpostインスタンスが配列として入っている。一覧で表示するのにforeachと使う。
    }
}
