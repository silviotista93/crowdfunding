<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'project_id' => \App\Project::all()->random()->id,
        'user_id' => \App\Project::all()->random()->id,
        'rating' => $faker->randomFloat(2,1,5)
    ];
});
