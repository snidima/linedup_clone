<?php
namespace App\Http\Controllers;



use App\Models\Billing;
use App\Models\BillingTmp;
use App\Models\PromoCodes;
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

        $billing = BillingTmp::find( $request->input('label') );

        $promo = PromoCodes::where('code', $billing->promo)->first();

        $price  = $billing->regular->finalPrice;

        $success = false;
        if( $promo ){

            $sale = $promo->value;
            $amount = $request->input('withdraw_amount');




        }

        dd( $price );


        $billing->amount = $request->input('withdraw_amount');
        $billing->information = json_encode( [
            'headers' => $request->header(),
            'data' => $request->all(),
        ] );

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