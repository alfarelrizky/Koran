<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\media;
use Faker\Generator as Faker;

$factory->define(media::class, function (Faker $faker) {
    return [
        'NamaMedia' => $faker->company(),
        'logo' => 'asset-news\images\logo-mediamasa\kompas.png',
    ];
});
