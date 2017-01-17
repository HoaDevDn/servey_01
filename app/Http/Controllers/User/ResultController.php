<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Repositories\Result\ResultInterface;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    protected $resultRepository;

    public function __construct(
        ResultInterface $resultRepository
    ) {
        $this->resultRepository = $resultRepository;
    }

    public function result(Request $request)
    {
        $answers = $request->get('answer');
        $data = [];
        foreach ($answers as $key => $value) {
            if (!is_array($value)) {
                $data[] = [
                    'sender_id' => auth()->id(),
                    'recevier_id' => $request->session()->get('survey')->user->id,
                    'answer_id' => $key,
                    'content' => $value,
                ];
            } else {
                foreach ($value as $key1 => $value2) {
                    $data[] = [
                        'sender_id' => auth()->id(),
                        'recevier_id' => $request->session()->get('survey')->user->id,
                        'answer_id' => $key1,
                        'content' => $value2,
                    ];
                }
            }
        }

        if ($this->resultRepository->multiCreate($data)) {
            return redirect()->action('User\SurveyController@getHome');
        }

        return redirect()->action('User\SurveyController@getHome')
            ->with('message-fail', 'Fail to survey');
    }
}
