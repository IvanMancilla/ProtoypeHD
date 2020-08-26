<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\group;
use App\course;
use App\participant;
use App\instructor;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function misCursos(){

    	$courses = array();
        $inc = 0;

    	$groups = group::where('participantId', session()->get('userId'))->get();
    	foreach ($groups as $group) {
    		$courses[$inc] =collect((object)course::where('courseId', $group->courseId)->get());    
        $inc = $inc +1;
    	}
    	$courses = collect($courses)->collapse();

    	return view('misCursos', compact('courses'));
    }

    public function participantProfile($id){

        $participant = participant::where('participantId',$id)->first();


        return view('participantProfile', compact('participant'));
    }

    public function instructorProfile($id){

        $instructor = instructor::where('instructorId',$id)->first();


        return view('instructorProfile', compact('instructor'));
    }

}
