<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InviteUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $name;
    private $email;
    private $link;
    private $recevier;

    public function __construct($name, $email, $link, $recevier)
    {
        $this->name = $name;
        $this->email = $email;
        $this->link = $link;
        $this->recevier = $recevier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')
            ->with([
                'name' => $this->name,
                'email' => $this->email,
                'link' => $this->link,
                'recevier' => $this->recevier,
            ]);
    }
}
