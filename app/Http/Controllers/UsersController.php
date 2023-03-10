<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('users.index', [
            'users' => $users
        ]);
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->all();

        User::create($data);

        return redirect()->route('users.index');
    }


    public function show($user)
    {
        //$user = User::find($id);
        return view('users.show', [
            'user' => $user
        ]);
    }


    public function edit($user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->only(['name', 'email']);

        $user = User::find($id);

        $user->update($data);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) throw new ModelNotFoundException();

        //$user->delete();
        $user->delete();

        return redirect()->back();
    }
}
