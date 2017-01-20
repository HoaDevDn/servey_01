<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\User\UserInterface;
use DB;
use Request;

class SurveyController extends Controller
{
    protected $surveyRepository;

    public function __construct(SurveyInterface $survey)
    {
        $this->surveyRepository = $survey;
    }

    public function index()
    {
        $surveyAll = $this->surveyRepository->paginate(5);
        $surveys = $surveyAll->where('feature', 0);
        $surveyFeature = $surveyAll->where('feature', 1);

        return view('admin.pages.surveys.list', compact('surveys', 'surveyFeature', 'surveyAll'))->render();
    }

    public function changeFeature(Request $request)
    {
        $ids = Request::get('checkbox-survey-change');

        if ($this->surveyRepository->multiUpdate('id', $ids, ['feature' => 0])) {
                return redirect()->action('Admin\SurveyController@index')->with('message', trans('admin.update.success'));
        }

        return redirect()->action('Admin\SurveyController@index')->with('message', trans('admin.update.fail'));

    }

    public function updateFeature()
    {
        $ids = Request::get('checkbox-survey-update');

        if ($this->surveyRepository->multiUpdate('id', $ids, ['feature' => 1])) {
                return redirect()->action('Admin\SurveyController@index')->with('message', trans('admin.update.success'));
        }

        return redirect()->action('Admin\SurveyController@index')->with('message', trans('admin.update.fail'));
    }

    public function destroySurvey()
    {
        if(Request::ajax()) {
            $idSurvey = Request::get("idSurvey");
            $this->surveyRepository->delete($idSurvey);
        }
    }
}
