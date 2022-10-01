<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {//テーブル作成のためのメソッドはcreateメソッド。
            $table->id();                                   //createメソッドの第一菱基数にはテーブル名, 第二引数には関数(新しいテーブルを定義するために使用できるBlueprintオブジェクトを受け取るクロージャ)
            $table->string('title', 50);
            $table->string('body', 200);
            $table->timestamps();//updated_at, created_atカラムを作ってくれる。
            $table->softDeletes();//deleted_atを作成してくれる。
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
