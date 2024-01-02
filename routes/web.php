<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LecturerController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return view('about');
// });

Auth::routes();

Route::group(['prefix' => '/scm', 'as' => 'scm.', 'middleware'=>'auth'], function () {
    Route::get('home', [App\Http\Controllers\HomeController::class,"index"])->name('home');
    Route::resource('student', StudentController::class)->middleware('can:isStudent');
    Route::resource('lecturer', LecturerController::class)->middleware('can:isALecturer');
    Route::resource('subject', SubjectController::class)->middleware('can:isAdmin');
    Route::post('/student/addsubject/{student}', [App\Http\Controllers\StudentController::class, "addSubject"])->name('student.addSubject');
    Route::post('/student/dropsubject/{student}', [App\Http\Controllers\StudentController::class, "dropSubject"])->name('student.dropSubject');
    
    // // Middleware 'can:isALecturer'
    // Route::group(['middleware' => ['can:isALecturer']], function () {
    //     Route::resource('/lecturer', LecturerController::class);
    // });

    // // Middleware 'can:isAdmin'
    // Route::group(['middleware' => ['can:isAdmin']], function () {
    //     Route::resource('/subject', SubjectController::class);
    // });

    // // Middleware 'can:isStudent'
    // Route::group(['middleware' => ['can:isStudent']], function () {
    //     Route::resource('/student', StudentController::class);
    // });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('student', StudentController::class);


