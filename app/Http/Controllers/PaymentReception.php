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

        $hashStringProccessed = implode( '&', [
            $request->input('notification_type'),
            $request->input('operation_id'),
            $request->input('amount'),
            $request->input('currency'),
            $request->input('datetime'),
            $request->input('sender'),
            $request->input('codepro'),
            env('YANDEXSECRET'),
            $request->input('label'),
        ] );
        $hashStringProccessed = hash("SHA1", $hashStringProccessed);

        if( $hashStringProccessed != $request->input('sha1_hash') )
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