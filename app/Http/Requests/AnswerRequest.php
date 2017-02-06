<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\Question\QuestionInterface;

class AnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected $surveyRepository;
    protected $questionRepository;
    protected $questionsId;

    public function __construct(
        SurveyInterface $surveyRepository,
        QuestionInterface $questionRepository
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->questionRepository = $questionRepository;
    }

    public function getQuestionId()
    {
        $survey = $this->surveyRepository
            ->where('token', str_replace(config('settings.replace'), '', $this->path()))
            ->lists('id')
            ->toArray();

        return $this->questionRepository
            ->where('survey_id', $survey[0])
            ->where('required', config('settings.required.true'))
            ->lists('id')
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

        foreach ($this->getQuestionId() as $question) {
            $rules['answer.' . $question] = 'required|max:255';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];

        foreach ($this->getQuestionId() as $question) {
            $messages['answer.' . $question . '.required'] = trans('messages.required', [
                'object' => class_basename(Answer::class)
            ]);
            $messages['answer.' . $question . '.max'] = trans('messages.max', [
                'object' => class_basename(Answer::class)
            ]);
        }

        return $messages;
    }
}
