<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\participant;
use App\instructor;
use App\admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function LoginParticipant()
    {

        $credentials = $this->validate(request(),[
            'email'=> 'email|required|string',
            'password'=>'required|string'
        ]);//Si no realiza acción el error se encuetra en validate();
        $validate=participant::where('participantEmail',$credentials['email'])->first();
        
        //if (Auth::attempt($credentials))
        if ($validate!=null && ($validate['participantPassword']==sha1($credentials['password']))) 
        {
            $usuario = participant::where('participantEmail',$credentials['email'])->first();
            //$id = $usuario['idUser'];
            $userId = $usuario['participantId'];
            $userName =$usuario['participantFirstName'];
            
            
            session()->put('userName',$userName);
            session()->put('userId', $userId);
            session()->put('userType', "participant");

            //return $credentials;
            return back(); // redirect('/');

        }else{
            //dd($validate['participantPassword']);
            return back(); //Agregar en formulario marca de error
        }
       
    }

    public function LoginAdmin()
    {

        $credentials = $this->validate(request(),[
            'email'=> 'email|required|string',
            'password'=>'required|string'
        ]);//Si no realiza acción el error se encuetra en validate();
        $validate=admin::where('adminEmail',$credentials['email'])->first();
        
        //if (Auth::attempt($credentials))
        if ($validate!=null && ($validate['adminPassword']==sha1($credentials['password']))) 
        {
            $usuario = admin::where('adminEmail',$credentials['email'])->first();
            //$id = $usuario['idUser'];
            $userId = $usuario['adminId'];
            $userName =$usuario['adminFirstName'];
            
            
            session()->put('userName',$userName);
            session()->put('userId', $userId);
            session()->put('userType', "admin");

            //return $credentials;
            return redirect('/');//return back(); // redirect('/');

        }else{
            
            //echo "Error";
            return back(); //Agregar en formulario marca de error
        }
       
    }

    public function LoginInstructor()
    {

        $credentials = $this->validate(request(),[
            'email'=> 'email|required|string',
            'password'=>'required|string'
        ]);//Si no realiza acción el error se encuetra en validate();
        $validate=instructor::where('instructorEmail',$credentials['email'])->first();
        
        //if (Auth::attempt($credentials))
        if ($validate!=null && ($validate['instructorPassword']==sha1($credentials['password']))) 
        {
            $usuario = instructor::where('instructorEmail',$credentials['email'])->first();
            //$id = $usuario['idUser'];
            $userId = $usuario['instructorId'];
            $userName =$usuario['instructorFirstName'];
            
            
            session()->put('userName',$userName);
            session()->put('userId', $userId);
            session()->put('userType', "instructor");

            //return $credentials;
            return redirect('/');

        }else{
            //echo "Error";
            return back(); //Agregar en formulario marca de error
        }
       
    }

    public function Logout(){
        session()->forget('userId');
        session()->forget('userName');
        session()->forget('userType');

        return redirect('/');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
