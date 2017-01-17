<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyInterface;
use Excel;

class ExcelController extends Controller
{
    protected $surveyRepository;

    public function __construct(
        SurveyInterface $survey
    ) {
        $this->surveyRepository = $survey;
    }

<<<<<<< HEAD
    public function explore($token, $type)
    {
        $survey = $this->surveyRepository
            ->where('token', $token)
            ->first();

        if ($survey && ($type == 'xls' || $type == 'xlsx')) {
=======
    public function explore($id)
    {
        $survey = $this->surveyRepository->find($id);

        if ($survey) {
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
            return Excel::create($survey->title, function($excel) use ($survey) {
                $excel->sheet($survey->title, function($sheet) use ($survey) {
                    $sheet->loadView('explore.excel', compact('survey'));
                    $sheet->setOrientation('landscape');
                });
<<<<<<< HEAD

                $excel->sheet('detail', function($sheet) use ($survey) {
                    $sheet->loadView('explore.detail', compact('survey'));
                    $sheet->setOrientation('landscape');
                });

            })->export($type);
=======
            })->export('xls');
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
        }
    }
}
