<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Invite\InviteInterface;
use App\Jobs\Mailable;
use App\Repositories\User\UserInterface;

class MailController extends Controller
{
    protected $inviteRepository;
    protected $userRepository;

    public function __construct(
        InviteInterface $invite,
        UserInterface $user
    ) {
        $this->inviteRepository = $invite;
        $this->userRepository = $user;
    }

    public function index()
    {

    }

    public function sendMail()
    {
        $invite = $this->inviteRepository->inviteUser(1,2,5);
        $sender = $this->userRepository->where('id', 1)->get()[0];
        $recevier = $this->userRepository->orWhere('id', 2)->get()[1];
        $link = 'http://localhost:8000/invite-user-survey/token=?' . $this->inviteRepository->where('id', $invite)->lists('token')->toArray()[0];
        dispatch(new Mailable($sender->name,$sender->email,$link,$recevier->email));

        return $this->inviteRepository->inviteUser(1,2,3);
    }
}
