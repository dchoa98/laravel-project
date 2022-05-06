<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(5);

        $keyword = $request->keyword;
        if ($keyword) {
            $users = User::where('username', 'like', "%".$request->keyword."%")
                         ->orWhere('email', 'like', "%".$request->keyword."%")
                         ->paginate(5);
        }
    
        return view('list', compact('users','keyword'));
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
        $users = User::findOrFail($id);

        return view('edit', compact('users'));
    }

    public function detailUser($id)
    {
        $user = User::findOrFail($id);

        return view('detail', compact('user'));
    }

    public function updateUser($id, UserRequest $request)
    {
        $users = User::findOrFail($id);

        $users->fill($request->all());
        $users->save();

        return redirect('/')->with(['message' => 'Update Success']);
    }

    public function deleteUser($id)
    {
        $users = User::findOrFail($id);

        User::destroy($id);

        return redirect('/')->with(['message' => 'Delete Success']);
    }
}
