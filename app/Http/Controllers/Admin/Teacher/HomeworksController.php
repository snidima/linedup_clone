<?php
namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Homework;
use Illuminate\Http\Request;


class HomeworksController extends AdminController
{
    public function index(Request $request)
    {
        return view('admin.teacher.homeworks', ['homeworks' => Homework::with(['regular','regular.course','user','lesson'])->get()]);
    }

    public function post($id, Request $request)
    {
        $h = Homework::find($id);
        $h->comment = $request->input('comment');
        $h->rate = $request->input('rate');
        $h->check = $request->input('check');
        $h->save();
        return redirect(route('admin.teacher.homework.get', ['id' => $id]));
    }

    public function detail( $id )
    {

        return view('admin.teacher.homework', ['homework' => Homework::where('id', $id)->with(['regular','regular.course','user','lesson'])->first() ]);
    }
}