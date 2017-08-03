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
$factory->define(BirBrand\Category::class, function (Faker\Generator $faker) {
    $title = $faker->sentence(2);
    return [
        'title' => $title,
        'slug' => str_slug($title,'-'),
        'description' => $faker->paragraph(),
        'user_id' => 1,
        'image_url' => 'https://aldim.az/uploads/item_gallery_photo/20612/image/710715.jpg',
        '_lft' => 1,
        '_rgt' => 2
    ];
});
