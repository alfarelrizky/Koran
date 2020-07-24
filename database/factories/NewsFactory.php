<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\news;
use Faker\Generator as Faker;

$factory->define(news::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
        'title' => $faker->sentence(3),
        'content' => $faker->paragraph(30),
        'file-type' => 'gambar', 
        'file' => 'asset-news/images/default.jpg',
        'media_massa' => $faker->company(),
        'viewer' => $faker->numberBetween($min=0 , $max=100),
    ];
});
