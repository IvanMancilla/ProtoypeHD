<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\participant;
use App\course;
use App\topic;
use App\instructor;
use App\schedule;
use App\preregister;
use App\group;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class courseController extends Controller
{
    public function showCourses(){

    	$courses = course::all();
    	//dd($cursos);

    	return view('courses', compact('courses'));


    }

    public function deleteCourse(){

        $data = request()->all();

        course::where('courseId',$data['id'])->delete();
        
        return redirect('/cursos');
    }

    public function showDetails($id)
    {

		$course = course::where('courseId',$id)->first();
		$topics = topic::where('courseId',$id)->get();
        $preregistro = preregister::where([['courseId',$course->courseId],['participantId', session()->get('userId')]])->first();
        $registro = group::where([['courseId',$course->courseId],['participantId', session()->get('userId')]])->first();
		$info = array();
        $instructor = instructor::where('instructorId',$course->instructorId)->first();
		$inc = 0;		
		foreach ($topics as $t) {
			//dd($t->subTopics);

			$info[$inc] =collect(explode(';',($t->subTopics)));    
        $inc = $inc +1;
		}
        
		//dd($info);
		//echo $topics->each;
		//dd($topics->each);
		//$a = $topics->each;
		//dd($topics);
		//$sub = explode(';', ($topics->subTopics));
		//dd($sub);
		return view('courseDetails',compact('course','topics','instructor', 'preregistro', 'registro'));

    }

    public function preregister(){
        
        $exist = preregister::where([['courseId',request('courseId')],['participantId', session()->get('userId')]])->first();
        if ($exist==null) {            
        
        preregister::create([
            'courseId' => request('courseId'),
            'participantId' => session()->get('userId'),
            'createdBy' => '100000000',
            'modifyBy' => '100000000'
        ]);
        return back();
        }else{
            echo "Ya se encuentra pre registrado";
        }
        
    }

    public function courseRegister(){
        
        $exist = preregister::where([['courseId',request('courseId')],['participantId', session()->get('userId')]])->first();
        if ($exist==null) {            
        
        group::create([
            'courseId' => request('courseId'),
            'participantId' => session()->get('userId'),
            'createdBy' => '100000000',
            'modifyBy' => '100000000'
        ]);
        return back();
        }else{
            echo "Ya se encuentra pre registrado";
        }
        
    }

    public function newCourse(){

    	
    	$data = request()->all();
    	$cont = $data['cont'];
        $contDay = $data['contDay'];
    	//$h = $data['duration']*1000;
    	$tim = ($data['hours']*10000)+($data['minutes']*100);
    	//dd($h);
    	//dd(trim($data['map']));
    	;
    	///////DETERMINAR SI ULTIMO CARACTER ES ; //////
		//if (substr(($data['ta1']), -1)==';') {
			//dd(substr(($topics->subTopics), -1));
		//}
		
    	course::create([

    		'courseName' => $data['name'],
    		'instructorId' => $data['instructor'],
    		'courseDate' => $data['startDate'],
    		'courseDuration' => $tim,
    		'courseDescription' => $data['description'],
    		'courseCategory' => 1,
    		'courseModality' => $data['modality'],
    		'courseCP' => $data['CP'],
    		'courseMap' => trim($data['map']),
    		'maximumPlaces' => $data['places'],
    		'availablePlaces' => $data['places'],
    		'createdBy' => '100000000',
    		'modifyBy' => '100000000'



                
        ]);

        $id= DB::table('courses')->where('courseName',$data['name'])->first();
        $nid= $id->courseId;
        for ($i=1; $i <= $cont; $i++) { 
        	topic::create([
        	'courseId' => $nid,
        	'topicName' => $data[('t'.$i)],
        	'subTopics' => $data['ta'.$i],
        	'createdBy' => '100000000',
    		'modifyBy' => '100000000'

        ]);
        }

        for ($i=1; $i <= $contDay; $i++) { 
            schedule::create([
            'courseId' => $nid,
            'scheduleDay' => $data[('day'.$i)],
            'scheduleStart' => $data['start'.$i],
            'scheduleEnd' => $data['end'.$i],
            'createdBy' => '100000000',
            'modifyBy' => '100000000'

        ]);
        }

        
        return redirect('/');

    }

}
