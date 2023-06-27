<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Termwind\render;
use App\Models\User;
use App\Models\Group;

class Login extends BaseController
{
    public function index()
    {

        return view('login');
    }

    public function login(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate user
        $user = User::where('username', $validatedData['username'])->first();
        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return redirect()->route('login')->withErrors(['Invalid credentials']);
        }

        // Log in the user
        Auth::login($user);

        return redirect()->route('logins');
    }



}
