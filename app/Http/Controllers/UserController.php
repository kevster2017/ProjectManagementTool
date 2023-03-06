<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '>', 0)
            ->orderBy('id', 'ASC')
            ->paginate(20);

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'userID' => ['required', 'string', 'max:10'],
            'isAdmin' => ['required'],
        ]);

        $user->name = $request->name;
        $user->userID = $request->userID;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->isAdmin = $request->isAdmin;


        $user->save();

        return redirect('/')->with('success', 'User Successfully Created!');
    }


    public function edit($id)
    {


        $user = User::findOrFail($id);

        $arr['user'] = $user;

        //dd($arr);
        return view('users.edit')->with($arr);
    }

    public function update(Request $request, $id)
    {


        $user = User::find($id);

        if (!empty($request->input('name'))) {
            $user->name = $request->name;
        }
        if (!empty($request->input('userID'))) {
            $user->userID = $request->userID;
        }

        if (!empty($request->input('email'))) {
            $user->email = $request->email;
        }
        if (!empty($request->input('password'))) {
            $user->password = $request->password;
        }

        $user->isAdmin = $request->isAdmin;


        // dd($user);

        $user->save();

        return redirect()->route('users.show', $user->id)->with('success', 'User details updated!');
    }


    public function show($id)
    {

        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function destroy($id)
    {

        User::destroy($id);

        return redirect('/')->with('success', 'User successfully deleted!');
    }
}
