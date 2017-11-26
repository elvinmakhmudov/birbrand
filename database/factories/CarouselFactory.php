<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(BirBrand\Carousel::class, function (Faker\Generator $faker) {
    $title = $faker->sentence(2);
    return [
        'title' => $title,
        'description' => $faker->paragraph(),
        'is_shown' => true,
        'user_id' => 1,
        'image_url' => '',
    ];
});
