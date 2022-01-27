<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        if ($auth == NULL) {
            return redirect('login');
        }
        $user_name = $auth->getAttributes()['name'];
        $courses = Courses::listCourses();
        $students = User::students();
        $view = view('teacher', compact('user_name', 'courses', 'students'));

        return $view;
    }

    public function assignStudent(Request $request)
    {
        $data = $request->all();
        if ($data['student'] != 'Students') {
            $user = User::find($data['student']);
            $user->coursesStudent()->attach($data['course']);
        }
        return back();
    }

    public function deassignStudent(Request $request)
    {
        $data = $request->all();
        if ($data['student'] != 'Students') {
            $user = User::find($data['student']);
            $user->coursesStudent()->detach($data['course']);
        }
        return back();
    }
}
