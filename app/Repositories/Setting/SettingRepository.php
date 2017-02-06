<?php

namespace App\Repositories\Setting;

use DB;
use Exception;
use App\Repositories\Setting\SettingInterface;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\BaseRepository;
use App\Models\Setting;

class SettingRepository extends BaseRepository implements SettingInterface
{
    protected $SettingRepository;
    protected $SurveyRepository;

    public function __construct(Setting $setting, SurveyInterface $survey)
    {
        parent::__construct($setting);
        $this->SurveyRepository = $survey;
    }

    public function delete($ids)
    {
        DB::beginTransaction();
        try {
            $ids = is_array($ids) ? $ids : [$ids];
            parent::delete($ids);
            DB::commit();

            return true;
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }
    }

    public function deleteBySurveyId($surveyId)
    {
        $settings = $this->whereIn('survey_id', $surveyId)->lists('id')->toArray();
        parent::delete($settings);
    }

    public function createMultiSetting(array $settings, $surveyId)
    {
        if (empty($settings['setting'])) {
            return true;
        }

        $inputs = [];

        foreach ($settings['setting'] as $key => $value) {
            $inputs[] = [
                'survey_id' => $surveyId,
                'key' => $key,
                'value' => $value,
            ];
        }

        return $this->multiCreate($inputs);
    }
}
