<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    $title = $faker->sentence;
    $status = $faker->randomElement([\App\Project::REVISION, \App\Project::PREAPPROVAL,\App\Project::APPROVAL,\App\Project::PUBLISHED,\App\Project::REJECTED]);
    return [
        'category_id' => \App\Category::all()->random()->id,
        'title' => $title,
        'slug' => str_slug($title,'-'),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
        'description' => $faker->sentence,
        'short_description' => $faker->sentence,
        'project_picture' => \Faker\Provider\Image::image(storage_path() . '/app/public/projects', 600,350,'fashion', false),
        'status' => $status,
        'previous_approved' => $status !== \App\Project::PUBLISHED ? false : true,
        'previous_rejected' => $status !== \App\Project::REJECTED ? true :false
    ];
});
