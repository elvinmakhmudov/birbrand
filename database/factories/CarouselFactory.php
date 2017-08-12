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
        'user_id' => 1,
        'is_shown' => true,
        'image' => 'https://aldim.az/uploads/banner/218/photo/light_resize/1444x800_crop_118af64bd984ce1ec1816025e4622dde.png',
    ];
});
