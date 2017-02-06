<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Result\ResultInterface;
use App\Repositories\Survey\SurveyInterface;
use App\Http\Controllers\Controller;
use App\Repositories\Invite\InviteInterface;
use App\Repositories\Setting\SettingInterface;
use Auth;
use DB;
use Exception;
use App\Http\Requests\AnswerRequest;
use Carbon\Carbon;

class ResultController extends Controller
{
    protected $resultRepository;
    protected $surveyRepository;
    protected $inviteReposirory;
    protected $settingReposirory;

    public function __construct(
        ResultInterface $resultRepository,
        SurveyInterface $surveyRepository,
        InviteInterface $inviteReposirory,
        SettingInterface $settingReposirory
    ) {
        $this->resultRepository = $resultRepository;
        $this->surveyRepository = $surveyRepository;
        $this->inviteReposirory = $inviteReposirory;
        $this->settingReposirory = $settingReposirory;
    }

    public function result($token, AnswerRequest $request)
    {
        $isSuccess = false;
        $answers = $request->get('answer');
        $data = [];
        $survey = $this->surveyRepository->where('token', $token)->first();
        $invite = $this->inviteReposirory
            ->where('recevier_id', auth()->id())
            ->where('survey_id', $survey->id)
            ->orWhere(function ($query) use ($survey) {
                $query->where('survey_id', $survey->id)
                    ->where('mail', (Auth::guard()->check()) ? Auth::user()->email : null);
            })
            ->first();

        if ($survey->feature
            || (!$survey->feature && Auth::guard()->check() && $invite)
            || auth()->id() == $survey->user_id
        ) {
            foreach ($answers as $answer) {
                if (!is_array($answer)) {
                    $answer = [$answer => null];
                }

                foreach ($answer as $key => $value) {
                    $data[] = [
                        'sender_id' => (auth()->id()) ?: null,
                        'recevier_id' => $survey->user_id,
                        'answer_id' => $key,
                        'content' => $value,
                        'name' => $request->get('name-answer'),
                        'email' => $request->get('email-answer'),
                        'created_at' => Carbon::now(),
                    ];
                }
            }

            $isSuccess = true;
        }

        DB::beginTransaction();
        try {
            if (!empty($data)
                && $this->resultRepository->multiCreate($data)
            ) {

                $decreaseNumber = $this->settingReposirory
                    ->where('survey_id', $survey->id)
                    ->where('key', config('settings.key.limitAnswer'))
                    ->first();

                if ($decreaseNumber && $decreaseNumber->value > 0) {
                    $decreaseNumber->update(['value' => --$decreaseNumber->value]);
                }

                $isSuccess = ($invite && $invite->status)
                    ? $invite->update(['status' => config('survey.invite.old')])
                    : true;
            }

            if (!$isSuccess) {
                throw new Exception;
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()
            ->action(($survey->feature) ? 'AnswerController@answerPublic' : 'AnswerController@answerPrivate', $survey->token)
            ->with(($isSuccess) ? 'message' : 'message-fail', ($isSuccess)
                ? trans('messages.object_created_successfully', [
                    'object' => class_basename(Answer::class),
                ])
                : trans('generate.permisstion', [
                    'object' => class_basename(Answer::class),
                ]));
    }
}
