<?php

namespace App\Repositories\Survey;

use DB;
use Exception;
use App\Repositories\Question\QuestionInterface;
use App\Repositories\Like\LikeInterface;
use App\Repositories\Invite\InviteInterface;
use App\Repositories\BaseRepository;
use App\Models\Survey;

class SurveyRepository extends BaseRepository implements SurveyInterface
{
    protected $likeRepository;
    protected $questionRepository;
    protected $inviteRepository;

    public function __construct(
        Survey $survey,
        QuestionInterface $question,
        LikeInterface $like,
        InviteInterface $invite
    ) {
        parent::__construct($survey);
        $this->likeRepository = $like;
        $this->inviteRepository = $invite;
        $this->questionRepository = $question;
    }

    public function delete($ids)
    {
        DB::beginTransaction();
        try {
            $ids = is_array($ids) ? $ids : [$ids];
            $this->inviteRepository->deleteBySurveyId($ids);
            $this->likeRepository->deleteBySurveyId($ids);
            $this->questionRepository->deleteBySurveyId($ids);
            parent::delete($ids);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();

            return false;
        }
    }

    public function resultSurvey($surveyId)
    {
        $survey = $this->find($surveyId);
        $datasInput = $this->inviteRepository->getResult($surveyId);
        $questions = $datasInput['questions'];
        $temp = [];
        $results = [];

        foreach ($questions as $key => $question) {
            $answers = $datasInput['answers']->where('question_id', $question->id)->pluck('id')->toArray();
            $temp[] = [
                'answers' => $answers,
                'question_id' => $question->id,
            ];
        }

        foreach ($temp as $array) {
            foreach ($array['answers'] as $key => $value) {
                $answerResult = $datasInput['results']->whereIn('answer_id', $value)->pluck('id')->toArray();
                $total = $datasInput['results']->whereIn('answer_id', $array['answers'])->pluck('id')->toArray();
                $results[] = [
                    'content_id' => $value,
                    'question_id' => $array['question_id'],
                    'percent' => (double)(count($answerResult)*100)/(count($total)),
                ];
            }
        }

        // return $results;
        dd($results);
    }
}
