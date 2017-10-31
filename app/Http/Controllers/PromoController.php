<?php
namespace App\Http\Controllers;



use App\Models\PromoCodes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PromoController extends Controller
{

    public function check( Request $request )
    {
        $code = $request->input('code');

        $promo = PromoCodes::where( 'code', $code )->first();

        $value = $promo->value;

        if( $promo )
            return $value;
        else return response()->json(false);
    }


}