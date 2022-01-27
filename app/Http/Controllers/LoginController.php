<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.logins');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registration(UserRegistrationRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'teacher';
        $teacher = TRUE;
        if ($_SERVER['HTTP_HOST'] == 'student.appname.localhost') {
            $data['role'] = 'student';
            $teacher = FALSE;
        }
        User::create($data);
        $user = User::query()->where('name', $data['name'])->firstOrFail();
        Auth::login($user);
        if ($teacher) {
            return response()->redirectTo(route('home'));
        } else {
            return response()->redirectTo(route('home_student'));
        }

    }

    public function loginOn(Request $request)
    {
        $user = User::query()->where('name', $request->input('name'))->firstOrFail();
        if (Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
        }
        $view = response()->redirectTo(route('home'));
        if ($_SERVER['HTTP_HOST'] == 'student.appname.localhost') {
            $view = response()->redirectTo(route('home_student'));
        }
        return $view;
    }

    public function logout()
    {
        Auth::logout();
        $view = response()->redirectTo(route('home'));
        if ($_SERVER['HTTP_HOST'] == 'student.appname.localhost') {
            $view = response()->redirectTo(route('home_student'));
        }
        return $view;
    }
}
