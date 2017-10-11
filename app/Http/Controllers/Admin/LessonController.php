<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LessonController extends AdminController
{
    public function index(Request $request)
    {
        $currentPage = $request->input('current');
        $totalPerPage = $request->input('onPage');

        Paginator::currentPageResolver(function() use ( $currentPage ){
            return $currentPage;
        });

        return Lesson::orderBy('title', 'asc')->paginate($totalPerPage);
    }

    public function lesson( $id )
    {
        return Lesson::find( $id )->toJson();
    }

    public function lessonSave( Request $request )
    {
        $lesson = Lesson::find( $request->input('id') );
        $r = $lesson->update( $request->all() );

    }

    public function lessonInsert( Request $request )
    {
        Lesson::create( $request->all() );
    }

    public function lessonDelete( $id )
    {
        Lesson::find($id)->delete();
    }

}