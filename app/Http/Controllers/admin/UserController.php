<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(UserRequest $request)
    {
        $model = User::all();

        return view('list', compact('model')); 
    }

    public function addUser()
    {
        return view('create');
    }

    public function createUser(UserRequest $request)
    {
        $model = new User();

        $model->fill($request->all());
        $model->save();

        return redirect('/');
    }

    public function editUser($id)
    {
        $model = User::find($id);

        if (!$model) 
        {
            return redirect()->back();
        }
        return view('edit', compact('model'));
    }

    public function detailUser($id)
    {
        $model = User::find($id);

        if (!$model) 
        {
            return redirect()->back();
        }
        return view('detail', compact('model'));
    }

    public function updateUser($id, UserRequest $request)
    {
        $model = User::find($id);

        $model->fill($request->all());
        $model->save();

        return redirect('/');
    }

    public function deleteUser($id)
    {
        User::destroy($id);
        return redirect('/')->with(['message' => 'Delete Success']);
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $list = User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->orWhere('id', 'like', "%$query%")
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('user.search', compact('list'));
    }
}
