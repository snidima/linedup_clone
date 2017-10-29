<?php


use App\Models\PromoCodes;
use Illuminate\Database\Seeder;

class PromoCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PromoCodes::create([
            'title' => 'Тестовый промокод',
            'code' => 'PRICE10',
            'value' => '95'
        ]);

    }
}
