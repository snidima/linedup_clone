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

        return Lesson::where('active', true)->paginate($totalPerPage);
    }

}