<?php
namespace App\Http\Controllers;



use App\Models\Billing;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;


class OrderController extends Controller
{

    public function create( Request $request )
    {

        $billing = Billing::create([
            'user_id' => $request->input('user'),
            'course_id' => $request->input('course'),
            'promo' => $request->input('promoCode'),
        ]);
        return $billing->id;
    }


}