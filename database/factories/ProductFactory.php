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
//    $folder= 'products/'.str_random(20);
    $folder = 'products/9vn6IsDHkgXIfudQ2X59';
    Storage::makeDirectory($folder);
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(4, 400),
        'category_id' => $faker->numberBetween(1, 6),
        'folder' => $folder,
        'user_id' => 1,
        'options' => json_encode(['color' => ['green', 'black', 'yellow'], 'size' => ['s', 'm', 'xl']]),
        'is_shown' => true,
        'cover_image' => 'products/9vn6IsDHkgXIfudQ2X59/nJqxiYG2EIxA0tc8mSNoMwbNceidTsQ8Io1GxgI0.jpeg',
        'images' => ["products/9vn6IsDHkgXIfudQ2X59/3OLcG29pIHf5SBMLd9bLLEuXxhMDrCKUA2e0DD9Z.jpeg"]];
});
