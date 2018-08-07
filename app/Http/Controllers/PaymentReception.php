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

        $billingTmp = BillingTmp::find( $request->input('label') );
        $promo = PromoCodes::where('code', $billingTmp->promo)->first();
        $price  = $need = $billingTmp->regular->finalPrice;


        if( $promo ){
            $sale = $promo->value;
            $need = ( $price - ( $price * $sale / 100 ) ) * 1;
        }

        dd($request->input('withdraw_amount')*1, $need);

        if( $request->input('withdraw_amount') * 1 < $need )
            return response(null, 406);


        $billing = Billing::create([
            'user_id' => $billingTmp->user_id,
            'course_id' => $billingTmp->course_id,
            'promo' => $billingTmp->promo,
            'amount' => $request->input('withdraw_amount'),
            'information' => json_encode( [
                'headers' => $request->header(),
                'data' => $request->all(),
            ] )
        ]);


        if( $billing )
            return response(null, 200);
        else
            return response(null, 406);

    }


}