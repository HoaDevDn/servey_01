<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Repositories\Result\ResultInterface;
use App\Repositories\Survey\SurveyInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Invite\InviteInterface;
use Auth;
use App\Http\Requests\AnswerRequest;

class ResultController extends Controller
{
    protected $resultRepository;
    protected $surveyRepository;
    protected $inviteReposirory;

    public function __construct(
        ResultInterface $resultRepository,
        SurveyInterface $surveyRepository,
        InviteInterface $inviteReposirory
    ) {
        $this->resultRepository = $resultRepository;
        $this->surveyRepository = $surveyRepository;
        $this->inviteReposirory = $inviteReposirory;
    }

    public function result($token, AnswerRequest $request)
    {
        $isSuccess = false;
        $answers = $request->get('answer');
        $data = [];
        $recevier = $this->surveyRepository->where('token', $token)->first();
        $check = $this->inviteReposirory
            ->where('recevier_id', auth()->id())
            ->where('survey_id', $recevier->id)
            ->orWhere(function ($query) use ($recevier) {
                $query->where('mail', Auth::guard()->check() ? Auth::user()->email : null)
                    ->where('survey_id', $recevier->id);
            })
            ->exists();

        if ($recevier->feature
            || (!$recevier->feature && Auth::guard()->check() && $check)
            || auth()->id() == $recevier->user_id
        ) {

            foreach ($answers as $answer) {
                if (!is_array($answer)) {
                    $answer = [$answer => null];
                }

                foreach ($answer as $key => $value) {
                    $data[] = [
                        'sender_id' => (auth()->id()) ? auth()->id() : null,
                        'recevier_id' => $recevier->user_id,
                        'answer_id' => $key,
                        'content' => $value,
                    ];
                }
            }
        }

        if (!empty($data) && $this->resultRepository->multiCreate($data)) {

            $isSuccess = true;
        }

        return redirect()
            ->action('SurveyController@getHome')
            ->with('message', ($isSuccess)
                ? trans('messages.result_success', [
                    'object' => class_basename(Answer::class),
                ])
                : trans('messages.result_fail', [
                    'object' => class_basename(Answer::class),
                ]));

    }
}
