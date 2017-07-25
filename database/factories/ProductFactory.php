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
$factory->define(BirBrand\Product::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(4,400),
        'user_id' => 1,
        'image_url' => 'https://aldim.az/uploads/item_gallery_photo/20612/image/710715.jpg',
    ];
});
