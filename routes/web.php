<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\AccessStudent;
use App\Http\Middleware\AccessTeacher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginOn'])->name('login_on');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login/register', [LoginController::class, 'register'])->name('register');
Route::post('/login/register', [LoginController::class, 'registration'])->name('registration');
Route::get('/', [TeacherController::class, 'index'])->name('home');
Route::get('/my-page', [StudentController::class, 'index'])->middleware([AccessStudent::class])->name('home_student');
Route::middleware([AccessTeacher::class])->group(function () {
    Route::get('/add-course', [CourseController::class, 'addCourse'])->name('add_course');
    Route::post('/create-course', [CourseController::class, 'createCourse'])->name('create_course');
    Route::get('/delete-course/{id}', [CourseController::class, 'deleteCourse'])->name('delete_course');
    Route::get('/edit-course/{courses}', [CourseController::class, 'editCourse'])->name('edit_course');
    Route::post('/update-course/{id}', [CourseController::class, 'updateCourse'])->name('update_course');
    Route::post('/assign-student', [TeacherController::class, 'assignStudent'])->name('assign_student');
    Route::post('/deassign-student', [TeacherController::class, 'deassignStudent'])->name('deassign_student');
    });

