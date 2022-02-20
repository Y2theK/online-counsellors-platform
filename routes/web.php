<?php

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\admins\UserController;
use App\Http\Controllers\users\ProfileController;
use App\Http\Controllers\admins\QuestionController;
use App\Http\Controllers\admins\DashboardController;
use App\Http\Controllers\users\AppointmentController;
use App\Http\Controllers\users\IndexController;

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



Auth::routes();

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/appointmentProposal/{user}', [HomeController::class, 'appointmentProposal'])->name('appointmentProposal');
Route::post('/submitAppointmentProposal/{user}', [HomeController::class, 'submitAppointmentProposal'])->name('submitAppointmentProposal');
Route::post('/search', [HomeController::class, 'search'])->name('search');
Route::post('/answerQuestions', [HomeController::class, 'answerQuestions'])->name('answerQuestions');

//counsellor routes
Route::middleware('auth')->prefix('users/')->as('users.')->group(function () {
    Route::get('/', [IndexController::class,'index'])->name('index');
    Route::resource('/profile', ProfileController::class);
    Route::resource('/appointments', AppointmentController::class);
});

//admin routes
Route::middleware('is_admin', 'auth')->prefix('admin/')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/questions', QuestionController::class);
});
