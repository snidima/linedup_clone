<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class HomeworkController extends AdminController
{
    public function index(Request $request)
    {
        return view('admin.homeworks', ['homeworks' => Homework::with(['regular','regular.course','user','lesson'])->get()]);
    }

    public function post($id, Request $request)
    {
        $h = Homework::find($id);
        $h->comment = $request->input('comment');
        $h->rate = $request->input('rate');
        $h->check = $request->input('check');
        $h->save();
        return redirect(route('admin.homework.get', ['id' => $id]));
    }

    public function get( $id )
    {
        return view('admin.homework', ['homework' => Homework::where('id', $id)->with(['regular','regular.course','user','lesson'])->first() ]);
    }

}