<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        // validation
        $this->validate( $request, [
            'email'    => 'required|email',
            'password' => 'required'
        ] );

        // sign in
        if(!auth()->attempt( $request->only( 'email', 'password' ), $request->remember )) {
            return back()->with('status', 'Invalid login');
        }

        // redirect
        return redirect()->route( 'admin.dashboard' );
    }
}
