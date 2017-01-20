<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use Request;
use Input;
use Hash;

class UserController extends Controller
{
    protected $userRepository;
    private $user;

    public function __construct(UserInterface $user)
    {
        $this->userRepository = $user;
    }

    public function index()
    {
        $users = $this->userRepository->paginate(10);
        $userActive = $users->where('status', 1);
        $userBlock = $users->where('status', 0);

        return view('admin.pages.users.list', compact('userActive', 'userBlock', 'users'));
    }

    public function blockUser()
    {
        $ids = Request::get('checkbox-user-block');

        if ($this->userRepository->multiUpdate('id', $ids, ['status' => 0])) {
            return redirect()->action('Admin\UserController@index')->with('message', 'admin.update.success');
        }

        return redirect()->action('Admin\UserContorller@index')->with('message', 'admin.update.faile');
    }

    public function activeUser()
    {
        $ids = Request::get('checkbox-user-active');

        if ($this->userRepository->multiUpdate('id', $ids, ['status' => 1])) {
            return redirect()->action('Admin\UserController@index')->with('message', 'admin.update.success');
        }

        return redirect()->action('Admin\UserContorller@index')->with('message', 'admin.update.faile');
    }

    public function show($id)
    {
        $user = $this->userRepository->where('id', $id)->first();
        $this->user = $user;

        return view('admin.pages.users.edit', compact('user'));
    }

    public function update($id)
    {
        $input = Request::all();
        $user = $this->userRepository->find($id);
        $input = Request::only('name', 'birthday', 'phone', 'address', 'gender', 'image');
        $oldImage = $user->image;
            if (isset($inputs['image'])) {
                $inputs['image'] = $this->uploadAvatar($oldImage);
            } else {
                $inputs['image'] = $oldImage;
            }

        if ($this->userRepository->update($user->id, $input)) {
            return redirect()->action('Admin\UserController@show', [$user->id])
                ->with('message', trans('user.update_user_successfully'));
        }

        return redirect()->action('Admin\UserController@update', [$user->id])->with('message', trans('user.update_user_fail'));
    }

    public function uploadAvatar($oldImage)
    {
        $file = Input::file('image');
        $destinationPath = base_path() . '/public' . config('users.avatar_path');
        $fileName = uniqid(rand(), true) . '.' . $file->getClientOriginalExtension();
        Input::file('image')->move($destinationPath, $fileName);

        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
    }
}
