<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
  public function index(){
      $auth = Auth::user();
      if ($auth == NULL) {
          return redirect('login');
      }
      $user_name = User::getName();
      $students = User::students();
      $courses = Courses::listCoursesStudent(Auth::id());
      $view = view('student', compact('user_name', 'courses', 'students'));
      return $view;
  }
}
