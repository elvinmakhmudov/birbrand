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
$factory->define(BirBrand\Banner::class, function (Faker\Generator $faker) {
    $bannerTypes = ['top-banner', 'left-banner', 'right-banner'];
    return [
        'image_url' => 'https://aldim.az/uploads/banner/225/photo/29cd16fed1f1f83a119599409f373c77.jpg',
        'description' => $faker->paragraph(),
        'is_shown' => true,
        'type' => $bannerTypes[rand(0, count($bannerTypes) - 1)],
        'url' => 'https://aldim.az/uploads/banner/225/photo/29cd16fed1f1f83a119599409f373c77.jpg',
        'user_id' => 1,
    ];
});
