<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        //$thisというのは、継承しているModelクラスに用意されたメソッドlimit()を使うから書かれている。ようはlimit()がgetByLimit()と並列に宣言されているからということ。
        return $this->orderby('updated_at', 'DESC')->paginate($limit_count);//Modelクラスのlimitメソッドを使っている。引数の数だけレコードを受け取るように制限するメソッド。
                                                 //その後ろでget()をしてあげれば、$limit_countの数だけPostモデルのインスタンスとしてレコードを取得するような処理になります。
        //また、更新日の降順で取得したいので、limit()の前にorderby()メソッドを加える。降順なので、第二引数に'DESC'を追加する。orderby()メソッドを親のModelクラスのメソッドの1つ。
    }
}
