<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('list', compact('users')); 
    }

    public function addUser()
    {

        return view('create');
    }

    public function createUser(UserRequest $request)
    {
        $users = new User();

        $users->fill($request->all());
        $users->save();

        return redirect('/');
    }

    public function editUser($id)
    {
        $users = User::find($id);

        if (!$users) 
        {
            return redirect('')->with(['message' => 'User không tồn tại']);
        }

        return view('edit', compact('users'));
    }

    public function detailUser($id)
    {
        $user = User::find($id);

        if (!$user) 
        {
            return redirect('/')->with(['message' => 'User không tồn tại']);
        }

        return view('detail', compact('user'));
    }

    public function updateUser($id, UserRequest $request)
    {
        $users = User::find($id);

        if (!$user) 
        {
            return redirect('')->with(['message' => 'User không tồn tại']);
        }

        $users->fill($request->all());
        $users->save();

        return redirect('/');
    }

    public function deleteUser($id)
    {
        $users = User::find($id);

        if (!$user) 
        {
            return redirect('/')->with(['message' => 'User không tồn tại']);
        }

        User::destroy($id);

        return redirect('/')->with(['message' => 'Delete Success']);
    }
}
