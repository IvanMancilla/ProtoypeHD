<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\help;

class mailController extends Controller
{
    public function enviarMail()
    {
    	$receivers = participant::pluck('participantEmail');
    	//dd($receivers);
        Mail::to($receivers)->send(new prueba);
    }

    public function helpMail()
    {

    	$mensaje = request()->validate([
    		'name' => 'required',
    		'email' => 'required|email' ,
    		'message' => 'required'
    	]);

    	Mail::to('information@hawksoftware.com.mx')->send(new help($mensaje));
    	return redirect('/');
    }

}
