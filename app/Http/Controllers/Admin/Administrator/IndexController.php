<?php
namespace App\Http\Controllers\Admin\Administrator;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;



class IndexController extends AdminController
{
    public function index(Request $request)
    {
        return view('admin.administrator.index');
    }



}