<?php

use BirBrand\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['name' => '123456789',
            'password' => bcrypt(123456789),
            'number' => '123456789',
            'is_admin' => true
        ]);
        // factory(User::class, 50)->create();
    }
}
