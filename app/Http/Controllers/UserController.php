<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->get();

        return view('components.user.content', compact('users'));
    }

    public function create()
    {
        return view('components.user.create_form');
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->all();
        $checkEmail = true;
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            $data['password'] = bcrypt($data['password']);
            User::create($data);
            $request->session()->flash('infoMessage', trans('user.create_user_success'));

            return redirect()->route('user.index');
        } else {
            $request->session()->flash('checkIssetEmail', trans('user.isset_email'));

            return redirect()->route('user.create');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if ($user) {
            return view('components.user.edit_form', compact('user'));
        } else {
            session()->flash('infoMessage', trans('user.isset_id'));

            return redirect()->route('user.index');
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::find($id);
        if ($user) {
            $user->update($data);
            $request->session()->flash('infoMessage', trans('user.update_user_success'));

            return redirect()->route('user.index');
        } else {
            session()->flash('infoMessage', trans('user.isset_id'));

            return redirect()->route('user.index');
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $request->session()->flash('infoMessage', trans('user.delete_user_success'));

            return redirect()->route('user.index');
        } else {
            session()->flash('infoMessage', trans('user.isset_id'));

            return redirect()->route('user.index');
        }
    }
}
