<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /*
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'title from seeder',
            'body' => 'body from seeder',
            'category_id' => '2',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
    シーダによって単一のデータを挿入する場合*/
    
    //複数のデータをファクトリによって挿入する場合
    public function run()
    {
        Post::factory()->count(10)->create();
    }
    
}
