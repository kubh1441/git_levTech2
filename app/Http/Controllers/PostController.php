<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;//Models内のPostクラスをインポート

class PostController extends Controller
{

    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(5)]);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);//show関数で対象のPostsテーブルデータを取得する
        //'post'はshow.blade.phpで使う変数。中身の$postはid=1のPostインスタンス
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
}
