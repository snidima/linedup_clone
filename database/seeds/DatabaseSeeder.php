<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(LessonsSeeder::class);
         $this->call(CoursesSeeder::class);
         $this->call(PromoCodesSeeder::class);
         $this->call(BillingSeeder::class);

         Artisan::call('course:create');
    }
}
