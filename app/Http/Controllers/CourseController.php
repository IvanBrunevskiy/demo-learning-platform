<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function addCourse()
    {
        $user_name = User::getName();
        return view('add_course', compact('user_name'));
    }

    public function createCourse(Request $request)
    {
        $data = $request->all();
        $link = explode('=', $data['video']);
        $link_up = explode('&', $link[1]);
        $handled_link = array_shift($link_up);

        Courses::create([
            'title' => $data['title'],
            'video' => $handled_link,
            'description' => $data['description'],
            'user_id' => Auth::id()
        ]);
        return response()->redirectTo(route('home'));
    }

    public function deleteCourse($id)
    {
        $single_course = Courses::find($id);
        $single_course->delete();
        return back();
    }

    public function editCourse(Courses $courses)
    {
        $user_name = User::getName();
        return view('edit_course', compact('courses', 'user_name'));
    }

    public function updateCourse(Request $request, $id)
    {
        $data = $request->all();
        $link = explode('=', $data['video']);
        if (count($link) > 1) {
            $link_up = explode('&', $link[1]);
            $handled_link = array_shift($link_up);
        } else {
            $handled_link = array_shift($link);
        }
        $courses = Courses::find($id);
        $courses->update([
            'title' => $data['title'],
            'video' => $handled_link,
            'description' => $data['description']
        ]);
        return response()->redirectTo(route('home'));
    }
}
