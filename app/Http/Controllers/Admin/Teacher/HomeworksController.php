<?php
namespace App\Http\Controllers\Admin\Teacher;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Homework;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeworksController extends AdminController
{
    public function index(Request $request)
    {

        $lessonmap = DB::table('course_lesson')->orderBy('id')->get()->pluck('lesson_id')->toArray();





        $h = Homework::with([
            'regular',
            'regular.course',
            'user',
            'lesson'
        ])->get();
//        dd($h);
        return view('admin.teacher.homeworks', ['homeworks' => $h,'lessonmap' => $lessonmap]);
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

    public function detail( $id )
    {
        $lessonmap = DB::table('course_lesson')->orderBy('id')->get()->pluck('lesson_id')->toArray();

        return view('admin.teacher.homework', ['homework' => Homework::where('id', $id)->with(['regular','regular.course','user','lesson'])->first(), 'lessonmap' => $lessonmap ]);
    }
}