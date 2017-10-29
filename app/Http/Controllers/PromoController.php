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

        if( $promo )
            return 3;
        else return response()->json(false);
    }


}