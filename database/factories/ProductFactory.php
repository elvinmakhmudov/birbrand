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
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(4,400),
        'category_id' => $faker->numberBetween(1,10),
        'user_id' => 1,
        'images' =>['https://aldim.az/uploads/item_gallery_photo/20612/image/710715.jpg',
            'https://aldim.az/uploads/item_gallery_photo/20612/image/710715.jpg',
            'https://aldim.az/uploads/item_gallery_photo/20612/image/710715.jpg',
            'https://aldim.az/uploads/item_gallery_photo/20612/image/710715.jpg',
    ]];
});
