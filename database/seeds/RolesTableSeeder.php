<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'slug' => 'administrator',
            'name' => 'Администратор',
        ]);
        Role::create([
            'slug' => 'client',
            'name' => 'Клиент',
        ]);
        Role::create([
            'slug' => 'partner',
            'name' => 'Партнер',
        ]);
    }
}
