<?php

namespace App\Mail;

use App\Models\User;
use App\Models\VerificationToken;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistrationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $token; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration');
    }
}
