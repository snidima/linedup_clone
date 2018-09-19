<?php
namespace App\Http\Controllers\Admin\Manager;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\BillingTmp;
use App\Models\Homework;
use App\Models\Lesson;
use App\Models\PromoCodes;
use App\Models\RegularCourse;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Providers\JWT\JWTInterface;


class IndexController extends AdminController
{
    public function clients(Request $request)
    {
        $users = User::orderBy('created_at', 'ASC')->paginate(10);

        return view('admin.manager.index', ['users' => $users] );
    }

    public function client( $id, JWTInterface $JWT )
    {

        $manager = Auth::user();

        $credentials = [
            'time' => (string) Carbon::now(),
            'user' =>  User::find($id),
            'manager' => $manager
        ];


        $token = $JWT->encode( $credentials );




        return view('admin.manager.client', [
            'user' => User::find($id),
            'billings' => Billing::where('user_id', $id)->orderBy('created_at','ASC')->get(),
            'billingsTmp' => BillingTmp::where('user_id', $id)->orderBy('created_at','ASC')->get(),
            'token' => $token
        ] );
    }



    public function loginby( JWTInterface $JWT, $token )
    {
        $credentials = $JWT->decode( $token );

        $time = Carbon::parse($credentials['time'])->diffInSeconds( Carbon::now() );

        if( $time > 30 ) throw new JWTException('token timeout');

        Auth::loginUsingId( $credentials['user']['id'] );

        return redirect(route('main'));
    }


    public function billings()
    {
        $billings = Billing::orderBy('id', 'DESC')->paginate(10);

        return view('admin.manager.billings', ['billings' => $billings] );
    }


    public function billing( $id )
    {
        $billing = Billing::find($id);
        $regulars = RegularCourse::all();
        $promo = PromoCodes::all();



        return view('admin.manager.billing', ['billing' => $billing, 'regulars' => $regulars, 'promos' => $promo] );
    }


    public function billingPost( $id, Request $request )
    {
        $billing = Billing::find( $id );

        $billing->amount = $request->input('amount');
        $billing->course_id = $request->input('regular');
        $billing->promo = $request->input('promo');

        $billing->save();

        return redirect(route('admin.manager.billing', ['id' => $id]));
    }

    public function billingAdd()
    {
        $regulars = RegularCourse::all();
        $users = User::all();
        $promo = PromoCodes::all();
        return view('admin.manager.billing-new', ['users' => $users, 'regulars' => $regulars, 'promos' => $promo] );
    }

    public function billingAddPost( Request $request )
    {
        $billing = new Billing;

        $billing->information = 'Manual pay';
        $billing->amount = $request->input('amount');
        $billing->user_id = $request->input('user_id');
        $billing->course_id = $request->input('course_id');
        $billing->promo = $request->input('promo');

        $billing->save();


        return redirect(route('admin.manager.billing', ['id' => $billing->id]));

    }

    public function billingDelete( Request $request, $id )
    {
        $billing = Billing::find( $id );
        $r = $billing->delete();
        return redirect(route('admin.manager.billings'));
    }

    public function billingDeletedList()
    {
        $billings = Billing::onlyTrashed()->orderBy('id', 'DESC')->paginate(10);

        return view('admin.manager.deleted-billings', ['billings' => $billings] );
    }

    public function billingRestore( $id )
    {
        $billing = Billing::onlyTrashed()->find( $id );
        $r = $billing->restore();



        return redirect(route('admin.manager.billings'));
    }

}