<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Repositories\Result\ResultInterface;
use App\Repositories\Survey\SurveyInterface;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    protected $resultRepository;
    protected $surveyRepository;

    public function __construct(
        ResultInterface $resultRepository,
        SurveyInterface $surveyRepository
    ) {
        $this->resultRepository = $resultRepository;
        $this->surveyRepository = $surveyRepository;
    }

    public function result($id, Request $request)
    {
        $answers = $request->get('answer');
        $data = [];
        $recevier = $this->surveyRepository->where('id', $id)->first();
        foreach ($answers as $answer) {
            if (is_array($answer)) {
                foreach ($answer as $key => $value) {
                    $data[] = [
                        'sender_id' => (auth()->id()) ? auth()->id() : null,
                        'recevier_id' => $recevier->user_id,
                        'answer_id' => $key,
                        'content' => $value,
                    ];
                }
            } else {
                $data[] = [
                    'sender_id' => (auth()->id()) ? auth()->id() : null,
                    'recevier_id' => $recevier->user_id,
                    'answer_id' => $answer,
                    'content' => null,
                ];
            }
        }

        if ($this->resultRepository->multiCreate($data)) {

            return redirect()->action('User\SurveyController@getHome');
        }

        return redirect()
            ->action('User\SurveyController@getHome')
            ->with('message-fail', 'Fail to survey');
    }
}
