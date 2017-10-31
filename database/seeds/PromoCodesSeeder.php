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

        for($i = 1; $i <= 100; $i++){
            PromoCodes::create([
                'title' => 'Тестовый промокод',
                'code' => 'PRICE'.$i,
                'value' => $i
            ]);
        }


    }
}
