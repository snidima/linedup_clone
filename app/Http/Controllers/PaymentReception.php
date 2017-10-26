<?php
namespace App\Http\Controllers;



use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PaymentReception extends Controller
{

    public function yandex( Request $request )
    {

        $payOK = false;
        if( $payOK )
            return response(null, 200);
        else
            return response(null, 406);
    }


}