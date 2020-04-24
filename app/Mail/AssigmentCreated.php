<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AssigmentCreated extends Mailable
{
    use Queueable, SerializesModels;
    
    public $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dvital1001@yandex.ru', 'Vitalii')->attach(storage_path('app/public/66'), ['as'=>'66.jpg'])->subject('New ticket ' . $this->ticket->title)->view('emails.assignment-created');
    }
}
