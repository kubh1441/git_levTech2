<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => fake()->word,
            'body' => fake()->text($maxNbChars = 6),
            'category_id' => 3,
        ];
    }
}

//親クラスのFactoryクラスから、FakerPHPというライブラリにアクセスしている。
