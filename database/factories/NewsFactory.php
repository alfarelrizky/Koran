<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\news;
use Faker\Generator as Faker;

$factory->define(news::class, function (Faker $faker) {
    $type = $faker->randomElement(['gambar', 'video']);
    return [
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
        'media_id' => $faker->numberBetween($min = 1, $max = 5),
        'title' => $faker->sentence(3),
        'content' => $faker->paragraph(30),
        'file-type' => $type,
        'file' => $type == 'gambar'? 'asset-news/images/default.jpg' : 'zdUy_pEA3FY',
        'editor' => $faker->name,
        'viewer' => $faker->numberBetween($min=0 , $max=100),
    ];
});