<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function edit(Request $request, User $user)
    {
        $this->validate( $request, [
            'name' => 'required',
            'email' => 'required|email'
        ] );

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        return back()->with('status', 'User has been updated!');
    }

    public function editPassword(Request $request, User $user)
    {
        $this->validate( $request, [
            'password' => 'required|confirmed',
        ] );

        $user->password = Hash::make( $request->get('password') );
        $user->save();

        return back()->with('status', 'Password has been updated!');
    }
}
