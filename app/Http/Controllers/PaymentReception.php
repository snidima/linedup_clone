<?php
namespace App\Http\Controllers;



use App\Models\Billing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PaymentReception extends Controller
{

    public function yandex( Request $request )
    {
        Log::info('YANDEX REQUEST',[
            'headers' => $request->header(),
            'data' => $request->all(),
        ] );

        $billing = Billing::find( json_decode( $request->input('label') )->orderId );

        $billing->amount = $request->input('withdraw_amount');
        $billing->information = json_encode( $request->all() );

        $billing->save();



        return response(null, 200);

//
//
//        $payOK = false;
//        if( $payOK )
//            return response(null, 200);
//        else
//            return response(null, 406);
    }


}