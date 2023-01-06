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
    public function __construct($user)
    {
        $this-> details = $user;
        //notify::class;
 }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        //User::class;
        return new Envelope(
            subject: 'Notify Email',
        );
    }
    
    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.mailuser',
          
        );
    
    }
    
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
   /*  public function attachments()
    {
        return[];

    } */
   /*  public function build(){
        return $this->view(view:'emails.mailuser')->compact(var_name:'details');
   } */
}
