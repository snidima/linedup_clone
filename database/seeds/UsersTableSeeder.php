<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $user = User::create([
            'name' => 'Снигур Дмитрий Александрович',
            'email' => 'snidima@mail.ru',
            'password' => '5783751907',
            'activated' => false
        ]);

    }
}
