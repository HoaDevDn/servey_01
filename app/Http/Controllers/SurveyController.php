<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Survey\SurveyInterface;
use App\Repositories\Question\QuestionInterface;
use App\Repositories\Invite\InviteInterface;
use App\Repositories\Setting\SettingInterface;
use App\Mail\InviteSurvey;
use App\Mail\ManageSurvey;
use Carbon\Carbon;
use Mail;
use Auth;
use DB;

class SurveyController extends Controller
{
    protected $surveyRepository;
    protected $questionRepository;
    protected $inviteRepository;
    protected $settingRepository;

    public function __construct(
        SurveyInterface $surveyRepository,
        QuestionInterface $questionRepository,
        InviteInterface $inviteRepository,
        SettingInterface $settingRepository
    ) {
        $this->surveyRepository = $surveyRepository;
        $this->questionRepository = $questionRepository;
        $this->inviteRepository = $inviteRepository;
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        return view('user.pages.home');
    }

    public function checkCloseSurvey($inviteIds, $surveyIds)
    {
        $ids = array_merge(
            $inviteIds->lists('survey_id')->toArray(),
            $surveyIds->lists('id')->toArray()
        );

        return $this->settingRepository
            ->whereIn('survey_id', $ids)
            ->where('key', config('settings.key.limitAnswer'))
            ->where('value', config('setting.isZero'))
            ->lists('survey_id')
            ->toArray();
    }

    public function listSurveyUser()
    {
        $invites = $inviteIds = $this->inviteRepository
            ->where('recevier_id', auth()->id())
            ->orWhere('mail', Auth::user()->email);
        $surveys = $surveyIds = $this->surveyRepository
            ->where('user_id', auth()->id());
        $settings = $this->checkCloseSurvey($inviteIds, $surveyIds);
        $invites = $invites
            ->orderBy('id', 'desc')
            ->paginate(config('settings.paginate'));
        $surveys = $surveys
            ->orderBy('id', 'desc')
            ->paginate(config('settings.paginate'));

        return view('user.pages.list-survey', compact('surveys', 'invites', 'settings'));
    }

    public function search(Request $request)
    {
        $count = $this->countSurveyAnswered();
        $surveys = $this->surveyRepository
                ->where('title', $request->get('txt-search'))
                ->paginate(config('settings.paginate'));

        return view('user.pages.home-user', compact('surveys','count'));
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $idSurvey = $request->get('idSurvey');
            $this->surveyRepository->delete($idSurvey);

            return [
                'success' => true,
            ];
        }

        return [
            'success' => false,
        ];
    }

    public function show($token)
    {
        $surveys = $this->surveyRepository->where('token', $token)->first();

        if ($surveys) {
            return view('user.pages.answer', compact('surveys'));
        }

        return view('errors.404');
    }

    public function create(Request $request)
    {
        $value = $request->only([
            'title',
            'feature',
            'deadline',
            'description',
            'txt-question',
            'checkboxRequired',
            'email',
            'emails',
            'setting',
            'name',
            'image',
        ]);

        if (!strlen($value['title'])) {
            $value['title'] = config('survey.title_default');
        }

        $token = md5(uniqid(rand(), true));
        $tokenManage = md5(uniqid(rand(), true));
        DB::beginTransaction();
        try {
            $survey = $this->surveyRepository
                ->create([
                    'user_id' => (Auth::guard()->check()) ? auth()->id() : null,
                    'mail' => (!Auth::guard()->check()) ? $value['email'] : null,
                    'title' => $value['title'],
                    'feature' => ($value['feature']) ? config('settings.feature') : config('settings.not_feature'),
                    'token' => $token,
                    'token_manage' => $tokenManage,
                    'status' => (Carbon::parse($value['deadline'])->gt(Carbon::now()) || (empty($value['deadline'])))
                        ? config('survey.status.avaiable')
                        : config('survey.status.block'),
                    'deadline' => (!empty($value['deadline'])) ? Carbon::parse($value['deadline'])->format('Y/m/d H:i') : null,
                    'description' => ($value['description']) ? : null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            $this->settingRepository->createMultiSetting($request->only(['setting']), $survey);
            $txtQuestion = $value['txt-question'];
            $questions = $txtQuestion['question'];
            $answers = $txtQuestion['answers'];
            $questionRequired = $value['checkboxRequired'];

            if ($survey) {
                $this->questionRepository
                    ->createMultiQuestion($survey, $questions, $answers, $value['image'],$questionRequired['question']);
                $isSuccess = $this->inviteUser($request, $survey, config('settings.return.bool'));
                $isSuccess = Mail::to($value['email'])->queue(new ManageSurvey([
                    'name' => $value['name'],
                    'title' => $value['title'],
                    'description' => $value['description'],
                    'link' => action(!($value['feature'])
                        ? 'AnswerController@answerPrivate'
                        : 'AnswerController@answerPublic', [
                            'token' => $token,
                    ]),
                    'link_manage' => action('AnswerController@show', [
                            'token' => $tokenManage,
                            'type' => ($value['feature']) ? config('settings.not_feature') : config('settings.feature'),
                    ]),
                ]));

                if (!$isSuccess) {
                    DB::rollback();

                    return redirect()->action('SurveyController@index')
                        ->with('message-fail', trans('messages.object_created_unsuccessfully', [
                            'object' => class_basename(Survey::class),
                        ]));
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->action('SurveyController@index')
                ->with('message-fail', trans('messages.object_created_unsuccessfully', [
                    'object' => class_basename(Survey::class),
            ]));
        }

        return view('user.pages.complete', [
            'name' => $value['name'],
            'email' => $value['email'],
            'token' => $token,
            'name' => $value['name'],
            'tokenManage' => $tokenManage,
            'feature' => ($value['feature']) ? config('settings.feature') : config('settings.not_feature'),
        ]);
    }

    public function inviteUser(Request $request, $surveyId, $type)
    {
        $isSuccess = false;
        $data['name'] = $request->get('name');
        $data['email'] = $request->get(($type == config('settings.return.bool')) ? 'email' : 'emailUser');
        $data['emails'] = $request->get(($type == config('settings.return.bool')) ? 'emails' : 'emailsUser');

        if (empty($data['emails'])) {
            return true;
        }

        $data['emails'] = explode(',', $data['emails']);

        if ($data['emails'] && $surveyId) {
            $survey = $this->surveyRepository->find($surveyId);
            $invite = $this->inviteRepository
                ->invite(auth()->id(), $data['emails'], $surveyId);

            if ($invite) {
                Mail::to($data['emails'])->queue(new InviteSurvey([
                    'senderName' => (Auth::guard()->check()) ? Auth::user()->name : $data['name'],
                    'email' => (Auth::guard()->check()) ? Auth::user()->email : $data['email'],
                    'survey' => $survey,
                    'link' => action(($survey->feature)
                        ? 'AnswerController@answerPublic'
                        : 'AnswerController@answerPrivate', [
                            'token' => $survey->token,
                    ]),
                ]));
                $isSuccess = true;
            }
        }

        return ($type == config('setttings.return.bool')) ? $isSuccess : ($isSuccess)
            ? redirect()->action('SurveyController@listSurveyUser')
                ->with('message', trans('survey.invite_success'))
            : redirect()->action('SurveyController@listSurveyUser')
                ->with('message-fail', trans('survey.invite_fail'));
    }

    public function updateSurvey(Request $request, $id)
    {
        $survey = $this->surveyRepository->find($id);
        $isSuccess = false;
        $data = $request->only([
            'title',
            'description',
            'deadline',
        ]);

        if ($survey) {
            DB::beginTransaction();
            try {
                $isSuccess = $this->surveyRepository->update($id, $data);
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }

        return redirect()->action('')
            ->with(($isSuccess) ? 'message' : 'message-fail', ($isSuccess)
                ? trans('messages.object_updated_successfully', [
                    'object' => class_basename(Survey::class),
                ])
                : trans('messages.object_updated_unsuccessfully',[
                    'object' => class_basename(Survey::class)
                ])
            );
    }
}
