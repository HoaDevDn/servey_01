<?php

namespace App\Repositories\Question;

use App\Repositories\Answer\AnswerInterface;
use App\Repositories\BaseRepository;
use DB;
use Exception;
use App\Models\Question;

class QuestionRepository extends BaseRepository implements QuestionInterface
{
    protected $answerRepository;

    public function __construct(
        Question $question,
        AnswerInterface $answer
    ) {
        parent::__construct($question);
        $this->answerRepository = $answer;
    }

    public function deleteBySurveyId($surveyIds)
    {
        $ids = is_array($surveyIds) ? $surveyIds : [$surveyIds];
        $questions = $this->whereIn('survey_id', $ids)->lists('id')->toArray();
        $this->answerRepository->deleteByQuestionId($questions);
        parent::delete($questions);
    }

    public function delete($ids)
    {
        DB::beginTransaction();
        try {
            $ids = is_array($ids) ? $ids : [$ids];
            $this->answerRepository->deleteByQuestionId($ids);
            parent::delete($ids);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }
    }

    public function createMultiQuestion($survey, $questions, $answers)
    {
        $questionsAdd = [];
        $answersAdd = [];
        foreach ($questions as $value) {
            $questionsAdd[] = [
                'content' => $value,
                'survey_id' => $survey,
                'image' => 'aaaa',
                'required' => true,
            ];
        }

        if ($this->multiCreate($questionsAdd)) {
            $questionIds = $this
                ->where('survey_id', $survey)
                ->lists('id')
                ->toArray();

            foreach (array_keys($questions) as $number => $index) {
                foreach ($answers[$index] as $key => $value) {
                    $type = array_keys($value)[0];
                    $answersAdd[] = [
                        'content' => $value[$type],
                        'question_id' => $questionIds[$number],
                        'type' => $type,
                    ];
                }
            }

            if ($this->answerRepository->multiCreate($answersAdd)) {
<<<<<<< HEAD
                dd($answersAdd, $questionsAdd);
=======
>>>>>>> user interface
                return true;
            }
        }

        return false;
    }
}
