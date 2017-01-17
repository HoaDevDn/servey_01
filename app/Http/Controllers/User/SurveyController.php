<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\Question\QuestionInterface;
use App\Repositories\Answer\AnswerInterface;

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
        $surveys = $this->surveyRepository->get();

        return view('user.pages.home', compact('surveys'));
    }

    public function createSurvey()
    {
        return view('user.pages.create');
    }

    public function delete()
    {
        if (Request::ajax()) {
            $idSurvey = Request::get("idSurvey");
            $this->surveyRepository->delete($idSurvey);
        }
    }

    public function answerSurvey($ids)
    {
        $surveys = $this->surveyRepository->where('id', $ids)->first();

        return view('user.pages.answer', compact('surveys'));
    }

    public function radioAnswer()
    {
        if (Request::ajax()) {
            $number = Request::get("number");
            $num_as = Request::get("num_as");

            return view('temps.text_radio', compact("num_as", "number"))->render();
        }
    }

    public function otherRadio()
    {
        if (Request::ajax()) {
            $number = Request::get("number");

            return view('temps.text_other_radio', compact("number"))->render();
        }
    }

    public function checkboxAnswer()
    {
        if (Request::ajax()) {
            $number = Request::get("number");
            $num_as = Request::get("num_as");
            $type = Request::get("type");

            return view('temps.text_checkbox', compact("num_as", "number", "type"))->render();
        }
    }

    public function otherCheckbox()
    {
        if (Request::ajax()) {
            $number = Request::get("number");

            return view('temps.text_other_checkbox', compact("number"))->render();
        }
    }

    public function radioQuestion()
    {
        if (Request::ajax()) {
            $number = Request::get('number');

            return view('temps.radio_question', compact('number'))->render();
        }
    }

    public function checkboxQuestion()
    {
        if (Request::ajax()) {
            $number = Request::get('number');

            return view('temps.checkbox_question', compact('number'))->render();
        }
    }

    public function shortQuestion()
    {
        if (Request::ajax()) {
            $number = Request::get('number');

            return view('temps.short_question', compact('number'))->render();
        }
    }

    public function longQuestion()
    {
        if (Request::ajax()) {
            $number = Request::get('number');

            return view('temps.long_question', compact('number'))->render();
        }
    }

    public function demo()
    {
        $survey = $this->surveyRepository
            ->create([
                'user_id' => 1,
                'title' => 'abc',
                'feature' => 0
            ]);
        $txt_question = Request::get('txt-question');
        $questions = $txt_question['question'];
        $answers =  $txt_question['answers'];

        if ($survey) {
            $this->questionRepository->createMultiQuestion($survey, $questions, $answers);
        }

        return redirect('/home');
    }
}
