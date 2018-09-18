<?php
namespace App\Http\Controllers\Admin\Manager;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\BillingTmp;
use App\Models\Homework;
use App\Models\Lesson;
use App\Models\RegularCourse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class IndexController extends AdminController
{
    public function clients(Request $request)
    {
        $users = User::orderBy('created_at', 'ASC')->paginate(10);

        return view('admin.manager.index', ['users' => $users] );
    }

    public function client( $id )
    {


        return view('admin.manager.client', [
            'user' => User::find($id),
            'billings' => Billing::where('user_id', $id)->orderBy('created_at','ASC')->get(),
            'billingsTmp' => BillingTmp::where('user_id', $id)->orderBy('created_at','ASC')->get()
        ] );
    }


    public function billings()
    {
        $billings = Billing::orderBy('id', 'ASC')->paginate(10);

        return view('admin.manager.billings', ['billings' => $billings] );
    }


    public function billing( $id )
    {
        $billing = Billing::find($id);
        $regulars = RegularCourse::all();



        return view('admin.manager.billing', ['billing' => $billing, 'regulars' => $regulars] );
    }


    public function billingPost( $id, Request $request )
    {
        $billing = Billing::find( $id );

        $billing->amount = $request->input('amount');
        $billing->course_id = $request->input('regular');

        $billing->save();

        return redirect(route('admin.manager.billing', ['id' => $id]));
    }

    public function billingAdd()
    {
        $regulars = RegularCourse::all();
        $users = User::all();
        return view('admin.manager.billing-new', ['users' => $users, 'regulars' => $regulars] );
    }

    public function billingAddPost( Request $request )
    {
        $billing = new Billing;


    }

}