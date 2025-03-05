<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|max:255|confirmed',
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/jobs');
    }

    public function loginForm()
    {
        return view('auth.login');
    }
}
