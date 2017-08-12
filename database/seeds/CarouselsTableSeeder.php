<?php

use BirBrand\Carousel;
use BirBrand\User;
use Illuminate\Database\Seeder;

class CarouselsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Carousel::class, 6)->create();
    }
}
