<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'video', 'user_id'];

    public static function listCourses()
    {
        $courses = Courses::all()->where('user_id', Auth::id());
        return $courses;
    }

    public function studentsCourse()
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

    public static function listCoursesStudent($id)
    {
        $courses = User::find($id)->coursesStudent;
        return $courses;
    }
}
