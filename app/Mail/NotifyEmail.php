<?php

namespace App\Mail;

use App\Console\Commands\notify;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    public function __construct($data)
    {
        $this-> details = $data;
        
        //notify::class;
 }
 Public function content(){
        return new Content(
view:'emails.mailuser',
with:['details'=>$this->details],
        );

 }

     public function build(){

        return $this->view('emails.mailuser');

   } 
}
