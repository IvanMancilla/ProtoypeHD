<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\participant;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Mailable;
use App\Mail\confirm;
use App\Mail\prueba;
use App\instructor;
use App\admin;
use Storage;
//use Mail;

class logController extends Controller
{
    public function showLog()
    {

        return view('log');

    }

    public function enviarMail()
    {
    	$receivers = participant::pluck('participantEmail');
    	//dd($receivers);
        Mail::to($receivers)->send(new prueba);
    }

    public function createUser()
    {
        //Falta vrificación de correo y contraseña

    	$data = request()->all();        
        $verifyMail = DB::table('participants')->where('participantEmail',$data['email'])->first();
        if ($verifyMail==null) {            

            participant::create([

                'participantFirstName' => $data['name'],
                'participantLastName' => $data['lastName'],
                'participantEmail' => $data['email'],
                'participantPassword' => sha1($data['password']),
                'participantBirthday' => $data['birthday'],                
                'participantPhone' => $data['phone_num'],
                'participantHQR'=> '/images/participants/',
                'participantCountry' => $data['country'],
                'participantRegion' => $data['region'],                
                'participantCP' => $data['CP'],                    
                'createdBy' => '1000000',
                'modifyDate' => date_create(),
                'modifyBy' => '1000000'                 
        ]);
            $user=DB::table('participants')->where('participantEmail',$data['email'])->first();
            DB::table('participants')->where('participantEmail',$data['email'])->update(['participantHQR' => '/images/participants/'.$user->participantId.'hqr.png']);
           return view('writer',compact('user'));
        }else{
            
            return redirect('/registro')->withInput()->with('err','El email ya se encuentra registrado');
            
        }
 		
        return redirect('/');

    }
    public function newInstructor()
    {
        //Falta vrificación de correo y contraseña

        $data = request()->all();
        
        $verifyMail = DB::table('instructors')->where('instructorEmail',$data['email'])->first();                

        if ($verifyMail==null) {
            //dd($verrifyMail);
            
            instructor::create([

                'instructorFirstName' => $data['name'],
                'instructorLastName' => $data['lastName'],
                'instructorEmail' => $data['email'],
                'instructorPassword' => sha1($data['password']),
                'instructorBirthday' => $data['birthday'],                
                'instructorAbstract' => $data['description'],
                'instructorPhone' => $data['phone_num'],
                'instructorHQR'=> '/',                                            
                
                'createdBy' => session()->get('userId'),
                'modifyDate' => date_create(),
                'modifyBy' => session()->get('userId')                 
        ]);
            request()->validate(['image' => 'image']);
            $a=request()->file('image');
            $ext = request()->image->extension();
            if ($a!=null) {
                
                 $idImg = DB::table('instructors')->where('instructorEmail',$data['email'])->first();
                 $ide= $idImg->instructorId;
           Storage::putFileAs('/images/instructors/', $a, $ide.'.'.$ext);
           DB::table('instructors')->where('instructorEmail',$data['email'])->update(['instructorImage' => '/storage/instructors/'.$ide.'.'.$ext]);

            }else{
                echo "err";
            }
           
    
           
        }else{
            
            return redirect('/registro')->withInput()->with('err','El email ya se encuentra registrado');
            //return view('registro', compact('e'))->withInput();
        }
        
        return redirect('/');

    }

    public function newAdmin()
    {
        //Falta vrificación de correo y contraseña

        $data = request()->all();
        
        $verifyMail = DB::table('admins')->where('adminEmail',$data['email'])->first();
        if ($verifyMail==null) {
            //dd($verrifyMail);
            
            admin::create([

                'adminFirstName' => $data['name'],
                'adminLastName' => $data['lastName'],
                'adminEmail' => $data['email'],
                'adminPassword' => sha1($data['password']),                                
                'adminHQR'=> '/',                                                            
                'createdBy' => '1000000',
                'modifyDate' => date_create(),
                'modifyBy' => '1000000'                 
        ]);
           
        }else{
            
            return redirect('/registro')->withInput()->with('err','El email ya se encuentra registrado');
            //return view('registro', compact('e'))->withInput();
        }
        
        return redirect('/');

    }
}
