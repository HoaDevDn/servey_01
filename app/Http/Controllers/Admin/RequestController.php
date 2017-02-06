<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Request\RequestRepository;
use App\Repositories\User\UserInterface;
use DB;
use Exception;
use Auth;

class RequestController extends Controller
{
    protected $requestRepository;
    protected $userRepository;

    public function __construct(
        RequestRepository $requestRepository,
        UserInterface $userRepository
    ) {
        $this->requestRepository = $requestRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $requests = $this->requestRepository->paginate(config('settings.paginate'));

        return view('admin.pages.requests.list', compact('requests'));
    }

    public function show($id)
    {

    }

    public function store(Request $request)
    {
        $isSuccess = false;

        if ($request->ajax()) {
            $emailUser = $request->get('emailUser');
            $content = $request->get('content');
            $type = $request->get('type');
            DB::beginTransaction();
            try {
                $user = $this->userRepository->where('email', $emailUser)->lists('id')->toArray();

                if (!$user) {
                    return respon()->json(['success' => false]);
                }

                $inputs = [
                    'content' => $content,
                    'admin_id' => auth()->id(),
                    'member_id' => $user[0],
                    'action_type' => $type,
                    'status' => 0,
                ];
                $this->requestRepository->create($inputs);
                $isSuccess = true;
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }

        return ['success' => $isSuccess];
    }

    public function update($id, Request $request)
    {
        $isSuccess = false;

        if ($request->ajax()) {
        DB::beginTransaction();
            try {
                $this->requestRepository->update($id, ['status' => 1]);
                $request = $this->requestRepository->find($id);
                $option = ($request->action_type) ? ['level' => 1] : config('users.status.block');
                $this->userRepository->changeStatus($request->member_id, $option);
                $isSuccess = true;
                DB::commit();

            } catch(Exception $e) {
                DB::rollback();
            }
        }

        return ['success' => $isSuccess];
    }

    public function destroy(Request $request)
    {
        $isSuccess = false;

        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $this->requestRepository->delete($request->get('requestId'));
                DB::commit();
                $isSuccess = true;
            } catch (Exception $e) {
                DB::rollback();
            }
        }

        return ['success' => $isSuccess];
    }

    public function cancel(Request $request)
    {
        $isSuccess = false;
        $id = $request->get('requestId');

        if ($request->ajax()) {
            DB::beginTransaction();
            try {
                $this->requestRepository->delete($id);
                DB::commit();
                $isSuccess = true;
            } catch (Exception $e) {
                DB::rollback();
            }
        }

        return ['success' => $isSuccess];
    }
}
