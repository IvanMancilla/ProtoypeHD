<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\course;
use App\instructor;
use App\category;

class viewsController extends Controller
{
    public function showHelp()
    {

        return view('help');

    }

    public function showUp()
    {

        return view('subida');

    }

    public function showAddCourse()
    {

        $instructors= instructor::all();
        $categories = category::all();
        
        return view('addCourse', compact('instructors','categories'));

    }

    public function showAddInstructor()
    {

        return view('addInstructor');

    }

    public function showLoginInstructor()
    {

        return view('loginInstructor');

    }

    public function showAddAdmin()
    {

        return view('addAdmin');

    }

    public function showLoginAdmin()
    {

        return view('loginAdmin');

    }

    public function showModifyCourse($id)
    {
        
        $course = course::where('courseId',$id)->first();

        return view('modifyCourse', compact('course'));

    }

}
