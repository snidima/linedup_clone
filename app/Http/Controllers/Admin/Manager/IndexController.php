<?php
namespace App\Http\Controllers\Admin\Manager;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\BillingTmp;
use App\Models\Homework;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class IndexController extends AdminController
{
    public function clients(Request $request)
    {
        $users = User::orderBy('created_at', 'ASC')->get();

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



}