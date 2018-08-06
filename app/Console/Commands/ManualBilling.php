<?php

namespace App\Console\Commands;

use App\Models\Billing;
use App\Models\RegularCourse;
use App\Models\User;
use Illuminate\Console\Command;

class ManualBilling extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'billings:create {--user=} {--course=} {--promo=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание новой оплаты';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $user = User::where('email', $this->option('user')) ->first();
        $course = RegularCourse::find( $this->option('course') );

        Billing::updateOrCreate([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'promo' => $this->option('promo'),
            'amount' => 0,
            'information' => 'Manual pay',
        ]);

        return true;

    }
}
