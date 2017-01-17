<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Repositories\Request\RequestRepository;
=======
use App\Repositories\Request\RequestInterface;
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
use App\Repositories\User\UserInterface;
use DB;
use Exception;
use Auth;

class RequestController extends Controller
{
    protected $requestRepository;
    protected $userRepository;

    public function __construct(
<<<<<<< HEAD
        RequestRepository $requestRepository,
=======
        RequestInterface $requestRepository,
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
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

<<<<<<< HEAD
    public function show($id)
    {

    }

=======
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
    public function store(Request $request)
    {
        $isSuccess = false;

        if ($request->ajax()) {
            $emailUser = $request->get('emailUser');
            $content = $request->get('content');
            $type = $request->get('type');
<<<<<<< HEAD
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
=======
            $user = $this->userRepository->where('email', $emailUser)->first()->id;

            if (!$user) {
                return respon()->json(['success' => false]);
            }

            $inputs = [
                'content' => $content,
                'admin_id' => auth()->id(),
                'member_id' => $user,
                'action_type' => $type,
                'status' => config('settings.request.watting'),
            ];
            DB::beginTransaction();
            try {
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
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
<<<<<<< HEAD
        DB::beginTransaction();
            try {
                $this->requestRepository->update($id, ['status' => 1]);
                $request = $this->requestRepository->find($id);
                $option = ($request->action_type) ? ['level' => 1] : config('users.status.block');
                $this->userRepository->changeStatus($request->member_id, $option);
                $isSuccess = true;
                DB::commit();

=======
            DB::beginTransaction();
            try {
                $this->requestRepository->update($id, ['status' => 1]);
                $request = $this->requestRepository->find($id);
                $option = ($request->action_type)
                    ? ['level' => config('users.level.admin')]
                    : ['status' => config('users.status.block')];
                $this->userRepository->changeStatus($request->member_id, $option);
                $isSuccess = true;
                DB::commit();
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
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
<<<<<<< HEAD

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
=======
>>>>>>> 502c1acb71f54042b858c3957071bf85add283df
}
