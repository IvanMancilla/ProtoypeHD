<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::GET('/', function () {
    return view('index');
});


Route::GET('/logout','Auth\LoginController@Logout')->name('logout');

//Auth::routes();
Route::GET('/cursos', 'courseController@showCourses');

Route::GET('/registro', function(){
	return view('register');
});

Route::GET('/genhqr', function(){
	return view('writer');
});

Route::GET('/home', 'HomeController@index')->name('home');

Route::GET('/mail','logController@enviarMail');

Route::GET('/ayuda','viewsController@showHelp');

Route::GET('/up','viewsController@showUp');

Route::GET('/addCourse','viewsController@showAddCourse');

Route::GET('/modifyCourse/{id}','viewsController@showModifyCourse');

Route::GET('/curso/{id}', 'courseController@showDetails')->name('courseDetails');

Route::GET('/misCursos', 'userController@misCursos')->name('misCursos');

Route::GET('/loginInstructor', 'viewsController@showLoginInstructor')->name('LoginInstructorView');

Route::GET('/loginAdmin', 'viewsController@showLoginAdmin')->name('LoginAdminView');

Route::GET('/addInstructor', 'viewsController@showAddInstructor')->name('addInstructor');

Route::GET('/addAdmin', 'viewsController@showAddAdmin')->name('addAdmin');

Route::GET('/participantProfile/{id}', 'userController@participantProfile')->name('participantProfile');

Route::GET('/instructorProfile/{id}', 'userController@instructorProfile')->name('instructorProfile');

Route::POST('/helpRequest', 'mailController@helpMail')->name('helpRequest');

Route::POST('/newCourse', 'courseController@newCourse')->name('newCourse');

Route::POST('/newInstructor', 'logController@newInstructor')->name('newInstructor');

Route::POST('/newAdmin', 'logController@newAdmin')->name('newAdmin');

Route::POST('/deleteCourse', 'courseController@deleteCourse')->name('deleteCourse');

Route::POST('/create', 'logController@createUser')->name('create');

Route::POST('/loginParticipant', 'Auth\LoginController@LoginParticipant')->name('LoginParticipant');

Route::POST('/loginInstructor', 'Auth\LoginController@LoginInstructor')->name('LoginInstructor');

Route::POST('/loginAdmin', 'Auth\LoginController@LoginAdmin')->name('LoginAdmin');

Route::POST('/preregister', 'courseController@preregister')->name('preregister');

Route::POST('/courseRegister', 'courseController@courseRegister')->name('courseRegister');

Route::POST('media', function () {
    request()->validate(['image' => 'image']);
    $a=request()->file('image');
    $ext = request()->image->extension();
    dd($a);
    //return $ext;
    Storage::putFileAs('/images/instructors/', $a, 'id.'.$ext);
    //return request()->file->storeAs('/images/', request()->file->getClientOriginalName());
    //return request()->file->storeAs('/images/', request()->file->getClientOriginalName());
});
