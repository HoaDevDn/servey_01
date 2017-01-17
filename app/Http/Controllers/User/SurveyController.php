<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\Question\QuestionInterface;
use App\Repositories\Answer\AnswerInterface;
use Auth;

class SurveyController extends Controller
{
    protected $surveyRepository;
    protected $questionRepository;
    protected $answerRepository;

    public function __construct(
        SurveyInterface $survey,
        QuestionInterface $question,
        AnswerInterface $answer
    ) {
        $this->surveyRepository = $survey;
        $this->questionRepository = $question;
        $this->answerRepository = $answer;
    }

    public function getHome()
    {

        $surveys = $this->surveyRepository
            ->where('user_id', Auth::user()->id)
            ->orWhere('feature', config('settings.survey.not_feature'))
            ->orderBy('id', 'desc')
            ->paginate(config('settings.paginate'));

        return view('user.pages.home', compact('surveys'));
    }

    public function createSurvey()
    {
        return view('survey.create');
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $idSurvey = $request->get("idSurvey");
            $this->surveyRepository->delete($idSurvey);

            return [
                'success' => true,
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function answerSurvey($ids)
    {
        $surveys = $this->surveyRepository->where('id', $ids)->first();

        return view('survey.answer', compact('surveys'));
    }

    public function radioAnswer(Request $request)
    {
        if ($request->ajax()) {
            $param = $request->only('number', 'num_as');

            return [
                'success' => true,
                'data' => view('temps.text_radio', $param)->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function otherRadio(Request $request)
    {
        if ($request->ajax()) {
            $number = $request->get("number");

            return [
                'success' => true,
                'data' => view('temps.text_other_radio', compact("number"))->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function checkboxAnswer(Request $request)
    {
        if ($request->ajax()) {
            $param = $request->only('number', 'num_as', 'type');

            return [
                'success' => true,
                'data' => view('temps.text_checkbox', $param)->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function otherCheckbox(Request $request)
    {
        if ($request->ajax()) {
            $number = $request->get("number");

            return [
                'success' => true,
                'data' => view('temps.text_other_checkbox', compact("number"))->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function radioQuestion(Request $request)
    {
        if ($request->ajax()) {
            $number = $request->get('number');

            return [
                'success' => true,
                'data' => view('temps.radio_question', compact('number'))->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function checkboxQuestion(Request $request)
    {
        if ($request->ajax()) {
            $number = $request->get('number');

            return [
                'success' => true,
                'data' => view('temps.checkbox_question', compact('number'))->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function shortQuestion(Request $request)
    {
        if ($request->ajax()) {
            $number = $request->get('number');

            return [
                'success' => true,
                'data' => view('temps.short_question', compact('number'))->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function longQuestion(Request $request)
    {
        if ($request->ajax()) {
            $number = $request->get('number');

            return [
                'success' => true,
                'data' => view('temps.long_question', compact('number'))->render(),
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function create(Request $request)
    {

        $value = $request->get('survey-name');

        if (strlen($value) == 0) {
            $value == config('survey.title_default');
        }
        $survey = $this->surveyRepository
            ->create([
                'user_id' => Auth::user()->id,
                'title' => $value,
                'feature' => config('settings.survey.not_feature'),
            ]);
        $txtQuestion = $request->get('txt-question');
        $questions = $txtQuestion['question'];
        $answers =  $txtQuestion['answers'];
        dd($txtQuestion);
        if ($survey) {
            $this->questionRepository->createMultiQuestion($survey, $questions, $answers);
        }

        return redirect()->action('User\SurveyController@getHome');
    }
}
