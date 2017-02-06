<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\Setting\SettingInterface;

class SettingController extends Controller
{
    protected $settingRepository;
    protected $surveyRepository;

    public function __construct(
        SurveyInterface $surveyRepository,
        SettingInterface $settingRepository
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->settingRepository = $settingRepository;
    }

    public function update($surveyId, Request $request)
    {
        $value = $request->only([
            'setting',
            'require-answer',
            'limmit-answer'
        ]);

        $getAllSetting = $this->settingRepository
            ->where('survey_id', $surveyId)
            ->lists('value', 'key')
            ->toArray();
        $getSettingByKey = $this->settingRepository->where('survey_id', $surveyId)->where('key', 1)->first();

        // dd($getAllSetting, $getSettingByKey->id,
        //     $value['setting'][1],
        //     (in_array($value['setting'][1],
        //         array_keys($getAllSetting)))
        // );
        dd($request->all());
        dd(in_array($value['setting'][1], array_keys($getAllSetting)) , !$value['setting'][1], $value['setting'][1]);
        if(!in_array($value['setting'][1], array_keys($getAllSetting)) && $value['setting'][1]) {
            $this->settingRepository->create([
                'key' => 1,
                'value' => $value['setting'][1],
            ]);
        } elseif (in_array($value['setting'][1], array_keys($getAllSetting)) && !$value['setting'][1]) {
            $this->settingRepository->deleteByKey($surveyId, 1);

        } else {
            $settingAnswer = $this->settingRepository
                ->where('survey_id', $surveyId)
                ->where('key', 1)
                ->first();

            $this->settingRepository->update($settingAnswer, $value['setting'][1]);
        }


    }
}
