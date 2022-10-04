<?php

namespace App\Http\Controllers;


use App\Models\Post;//Models内のPostクラスをインポート
use App\Models\Category;
use App\Http\Requests\PostRequest; // useする

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
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    
    public function store(Post $post, PostRequest $request)//postsテーブルにアクセスし保存する必要があるため、空のPostインスタンスを利用
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(Post $post, PostRequest $request)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
