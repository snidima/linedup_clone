<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LessonController extends AdminController
{
    public function index()
    {
        return response()->json([
            'test' => 'ok'
        ]);
    }

}