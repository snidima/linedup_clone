<?php

use App\Models\Billing;
use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Billing::create([
            'user_id' => 1,
            'course_id' => 1,
            'promo' => 'PRICE98',
            'amount' => 999,
            'information' => '',
        ]);
        Billing::create([
            'user_id' => 5,
            'course_id' => 1,
            'promo' => 'PRICE98',
            'amount' => 999,
            'information' => '',
        ]);
    }
}
