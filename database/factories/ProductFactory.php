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
    $folder = 'products/sample';
    Storage::makeDirectory($folder);
    $likes = $faker->numberBetween(1,100);
    $dislikes = $faker->numberBetween(1,100);
    $rating = $likes * 5 / ($likes + $dislikes);
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(),
        'price' => $faker->numberBetween(4, 400),
        'category_id' => $faker->numberBetween(1, 6),
        'folder' => $folder,
        'likes' => $likes,
        'dislikes' => $dislikes,
        'user_id' => 1,
        'rating' => $rating,
        'trending' => $faker->numberBetween(1,100),
        'ordered' => $faker->numberBetween(1,100),
        'options' => json_encode(['color' => ['green', 'black', 'yellow'], 'size' => ['s', 'm', 'xl']]),
        'is_shown' => true,
        'cover_image' => 'products/sample/1.jpeg',
        'images' => ["products/sample/2.jpeg"]];
});
