<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\Question\QuestionInterface;
use App\Repositories\Answer\AnswerInterface;

class AnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $surveyRepository;
    protected $questionRepository;
    protected $answerRepository;
    protected $questionsId;
    protected $answerId;

    public function __construct(
        SurveyInterface $surveyRepository,
        QuestionInterface $questionRepository,
        AnswerInterface $answerRepository,
        Request $request
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->questionRepository = $questionRepository;
        $this->answerRepository = $answerRepository;
        $this->questionsId = $this->getQuestionId($request->token);
        $this->answerId = $this->getAnswerId($request->token);
    }

    public function getQuestionId($token)
    {
        $survey = $this->surveyRepository
            ->where('token', $token)
            ->first()
            ->id;

        return $this->questionRepository
            ->where('survey_id', $survey)
            ->where('required', config('settings.required.true'))
            ->lists('id')
            ->toArray();
    }

    public function getAnswerId($token)
    {
        $question = $this->getQuestionId($token);

        return $this->answerRepository
            ->whereIn('question_id', $question)
            ->whereIn('type', [
                config('survey.type_time'),
                config('survey.type_date'),
                config('survey.type_text'),
            ])
            ->lists('id', 'question_id')
            ->toArray();
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $answers = $this->answerId;

        foreach ($this->questionsId as $key => $question) {
            if (in_array($question, array_keys($answers))) {
                $rules['answer.' . $question . '.' . $answers[$question]] = 'required|max:255';
            } else {
                $rules['answer.' . $question] = 'required|max:255';
            }
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];
        $answers = $this->answerId;

        foreach ($this->questionsId as $question) {
            if (in_array($question, array_keys($answers))) {
                $messages['answer.' . $question . '.' . $answers[$question] . '.required'] = trans('messages.required', [
                    'object' => class_basename(Answer::class),
                ]);
                $messages['answer.' . $question . '.' . $answers[$question] . '.max'] = trans('messages.max', [
                    'object' => class_basename(Answer::class),
                ]);
            } else {
                $messages['answer.' . $question . '.required'] = trans('messages.required', [
                    'object' => class_basename(Answer::class),
                ]);
                $messages['answer.' . $question . '.max'] = trans('messages.max', [
                    'object' => class_basename(Answer::class),
                ]);
            }
        }

        return $messages;
    }
}
