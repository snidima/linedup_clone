<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CourseController extends AdminController
{
    public function index(Request $request)
    {
        $currentPage = $request->input('current');
        $totalPerPage = $request->input('onPage');

        Paginator::currentPageResolver(function() use ( $currentPage ){
            return $currentPage;
        });

        return Course::orderBy('id', 'asc')->paginate($totalPerPage);
    }

    public function lesson( $id )
    {
        return Course::find( $id )->toJson();
    }

    public function lessonSave( Request $request )
    {
        $lesson = Course::find( $request->input('id') );

        $data = $request->all();
        $data['date_start'] = Carbon::parse($request->input('date_start'));
        $data['date_end'] = Carbon::parse($request->input('date_end'));

//        dd( $data['date_start'] );

        $r = $lesson->update( $data );

    }

    public function lessonInsert( Request $request )
    {
        $data = $request->all();
        $data['date_start'] = Carbon::parse($request->input('date_start'));
        $data['date_end'] = Carbon::parse($request->input('date_end'));
//        dd($data['date_start']);
        Course::create( $data );
    }

    public function lessonDelete( $id )
    {
        Course::find($id)->delete();
    }

}