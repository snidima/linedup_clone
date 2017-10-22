<?php
namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\TmpFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('user.main');
    }

    public function courseInfo()
    {
        $now = Carbon::now();

        $courses = Course::
            where('date_start', '<=', $now)
            ->where('date_end', '>=', $now)
            ->where('active', true)
            ->with('lessons')->first();
        return $courses;
    }

    public function fileUpload( Request $request )
    {
        $file = $request->file('file');
        $title = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();

        $path = storage_path().'/tmp_files/';
        $name = uniqid(rand(), true).".$ext";

        $user_id = Auth::user()->id;
        $tmp_file = new TmpFiles;

        $tmp_file->user_id = $user_id;
        $tmp_file->path = $name;
        $tmp_file->title = $title;

        $tmp_file->save();



        if( $file->move($path, $name) )
            return response()->json( $tmp_file->id );

    }
}