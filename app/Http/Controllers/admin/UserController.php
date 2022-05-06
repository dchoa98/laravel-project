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
        $users = new User();

        $keyword = $request->keyword;
        if ($keyword) {
            $users =  $users->where('username', 'like', "%".$request->keyword."%")
                            ->orWhere('email', 'like', "%".$request->keyword."%");
        }
        $users = $users->paginate(5)->appends($request->except('page'));
    
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
        if($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $imagePath = $request->avatar->storeAs('public/uploads/users', $newFileName);
            $users->avatar = str_replace('public/', '', $imagePath);
        }
        $users->save();

        return redirect('/')->with(['message' => 'Create New Success']);
    }

    public function editUser($id)
    {
        $users = User::findOrFail($id);

        return view('edit', compact('users'));
    }
    
    public function updateUser($id, UserRequest $request)
    {
        $users = User::findOrFail($id);

        $users->fill($request->all());
        if($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $imagePath = $request->avatar->storeAs('public/uploads/users', $newFileName);
            $users->avatar = str_replace('public/', '', $imagePath);
        }
        $users->save();

        return redirect('/')->with(['message' => 'Update Success']);
    }

    public function detailUser($id)
    {
        $user = User::findOrFail($id);

        return view('detail', compact('user'));
    }


    public function deleteUser($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect('/')->with(['message' => 'Delete Success']);
    }
}
