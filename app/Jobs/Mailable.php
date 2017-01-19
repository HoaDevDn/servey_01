<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\InviteUser;

class Mailable implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $name;
    private $email;
    private $link;
    private $recevier;

    public function __construct($senderName, $email, $link, $recevier)
    {
        $this->name = $senderName;
        $this->email = $email;
        $this->link = $link;
        $this->recevier = $recevier;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $message = (new InviteUser(
            $this->name,
            $this->email,
            $this->link,
            $this->recevier
        ))->onQueue('emails');

        Mail::to($this->recevier)
            ->queue($message);
    }
}
