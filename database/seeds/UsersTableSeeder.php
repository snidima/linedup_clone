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
        //todo проверить активность перед отсылкой, исправить уловие по среде
        $user = User::create([
            'name' => 'Снигур Дмитрий Александрович',
            'email' => 'snidima@mail.ru',
            'password' => '555666',
        ]);

        for ($i = 1; $i <= 10; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => 555,
            ]);
        }

    }
}
