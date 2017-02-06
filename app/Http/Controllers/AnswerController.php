<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Invite\InviteInterface;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\Setting\SettingInterface;
use Auth;
use Carbon\Carbon;

class AnswerController extends Controller
{
    protected $surveyRepository;
    protected $inviteRepository;
    protected $settingRepository;

    public function __construct(
        SurveyInterface $surveyRepository,
        InviteInterface $inviteRepository,
        SettingInterface $settingRepository
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->inviteRepository = $inviteRepository;
        $this->settingRepository = $settingRepository;
    }

    private function chart(array $inputs)
    {
        $result = [];

        foreach ($inputs as $key => $value) {
            $results[] = [
                'answer' => $value['content'],
                'percent' => $value['percent'],
            ];
        }

        return $results;
    }

    private function viewChart($token)
    {
        $results = $this->surveyRepository->getResutlSurvey($token);
        $charts = [];

        if (!$results) {
            return [
                'charts' => null,
                'status' => false,
            ];
        }

        foreach ($results as $key => $value) {
            $charts[] = [
                'question' => $value['question'],
                'chart' => ($this->chart($value['answers'])) ?: null,
            ];
        }

        return [
            'charts' => $charts,
            'status' => true,
        ];
    }

    public function checkSurvey($surveyId, $deadline, $status, $type)
    {
        $date = ($deadline) ? Carbon::parse($deadline)->gt(Carbon::now()) : 'true';
        $invite = true;

        if (!$date || !$status) {
            return false;
        } elseif ($type == config('survey.private')) {
            $invite =  $this->inviteRepository
                ->where('recevier_id', auth()->id())
                ->where('survey_id', $surveyId)
                ->exists();
        }

        return $invite;
    }

    public function answer($token, $type, $view)
    {
        $survey = $this->surveyRepository
            ->where(($view == config('temp.view.answer')) ? 'token' : 'token_manage', $token)
            ->first();

        if (!$survey) {
            return view('errors.404');
        }

        $history = ($view == config('temp.view.answer')) ? $this->inviteRepository->getHistory($survey->id) : null;
        $getCharts = $this->viewChart($survey->token);
        $status = $getCharts['status'];
        $charts = $getCharts['charts'];
        $access = $this->settingRepository
            ->where('survey_id', $survey->id)
            ->whereIn('key', config('settings.options'))
            ->lists('value','key')->toArray();

        if ($survey) {
            if ($survey->user_id == auth()->id()
                || $this->checkSurvey($survey->id, $survey->deadline, $survey->status, $type)
                || $view == config('temp.view.detail')
            ) {
                return view(($view == config('temp.view.answer')) ? 'user.pages.answer' : 'user.pages.detail-survey', [
                    'survey' => $survey,
                    'status' => $status,
                    'charts' => $charts,
                    'access' => $access,
                    'history' => $history,
                ]);
            }
        }

        return redirect()->action('SurveyController@index')
            ->with('message-fail', trans('messages.permisstion',[
                'object' => class_basename(Invite::class),
            ]));
    }

    public function answerPublic($token)
    {
        return $this->answer($token, config('survey.public'), config('temp.view.answer'));
    }

    public function answerPrivate($token)
    {
        return $this->answer($token, config('survey.private'), config('temp.view.answer'));
    }

    public function show($token, $type)
    {
        return $this->answer($token, $type, config('temp.view.detail'));
    }
}
