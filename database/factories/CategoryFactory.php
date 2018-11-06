<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category' => $faker->randomElement(['Rock','Pop','Popular','Vallenato','Música Clásica','Jazz','Norteño','Metal','Reggae','Rap','Salsa','Reggaeton']),
        'description' => $faker->sentence
    ];
});
