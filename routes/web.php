<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/', function () {
    return view('dashboard/index');
})->middleware('auth');

Auth::routes();

// Grouping routes that need authentication
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('year', YearController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('user', UserController::class);
    Route::resource('score', ScoreController::class);
    Route::resource('timetable', TimetableController::class);
    Route::resource('result', ResultController::class);
    Route::resource('news', NewsController::class);
});

Route::get('/survey', function () {
    return view('survey');
});

