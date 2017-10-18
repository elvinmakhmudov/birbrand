<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['men', 'women', 'kids', 'appliances', 'auto', 'school'];
        foreach ($titles as $title) {
            factory(\BirBrand\Category::class)->create([
                'title' => $title
            ]);
        }
    }
}
