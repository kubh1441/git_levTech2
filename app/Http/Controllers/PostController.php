<?php

namespace App\Http\Controllers;


use App\Models\Post;//Models内のPostクラスをインポート
use App\Models\Category;
use App\Http\Requests\PostRequest; // useする

class PostController extends Controller
{

    public function index(Post $post)
    {
        //クライアントインスタンス作成
        $client = new \GuzzleHttp\Client();
        
        //GET通信するURL
        $url = 'https://teratail.com/api/v1/questions';
        
        //リクエスト送信と返却データの取得
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.teratail.token')]
        );
        
        //API通信で取得したデータはjson形式なのでPHPファイルに対応した連想配列にデコードする。
        $questions = json_decode($response->getBody(), true);
        
        //indexbladeに取得したデータを渡す。
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(5),//これは、ぺ時ネーションを行ってビューを返してるだけ。
            'questions' => $questions['questions'],//これは、API通信で取得したデータを連想配列にデコードしたものをquestionという名前でビューに返す。
        ]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);//show関数で対象のPostsテーブルデータを取得する
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
