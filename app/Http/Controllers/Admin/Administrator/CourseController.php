<?php
namespace App\Http\Controllers\Admin\Administrator;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;



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
        $r = $lesson->update( $data );

    }

    public function lessonInsert( Request $request )
    {
        $data = $request->all();
        Course::create( $data );
    }

    public function lessonDelete( $id )
    {
        Course::find($id)->delete();
    }

}