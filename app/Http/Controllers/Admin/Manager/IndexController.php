<?php
namespace App\Http\Controllers\Admin\Manager;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class IndexController extends AdminController
{
    public function index(Request $request)
    {
        return view('admin.manager.index');
    }



}