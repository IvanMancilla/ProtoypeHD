<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
//use Illuminate\Mail\confirm;
use Illuminate\Queue\SerializesModels;

class confirm extends Mailable
{
    use Queueable, SerializesModels;

    //public $atributos;
    public $subject = 'Prueba envio';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->atributos = $atributos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.confirm');
    }

    public function enviar(){
        //$receivers = participant::pluck('participantEmail');
        //Mail::to($receivers)->send(new EmergencyCallReceived($call));
    }
}
