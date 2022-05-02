<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AssessmentController;

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
    return view('landing');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/{role}', [HomeController::class, 'roleSelect'])->name('roleSelect');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/postCreate', [ProfileController::class, 'postCreate'])->name('profile.postCreate');
Route::post('/profile/{user_id}/postEdit', [ProfileController::class, 'postEdit'])->name('profile.postEdit');

Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/role/postCreate', [RoleController::class, 'postCreate'])->name('role.postCreate');
Route::get('/role/{user_id}/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/role/{user_id}/{oldRole}/postEdit', [RoleController::class, 'postEdit'])->name('role.postEdit');

Route::get('/{role}/assessment/create', [AssessmentController::class, 'create'])->name('assessment.create');
Route::post('/{role}/assessment/postCreate', [AssessmentController::class, 'postCreate'])->name('assessment.postCreate');
Route::post('/assessment/{user_id}/{role}/{assessment}/postEdit', [AssessmentController::class, 'postEdit'])->name('assessment.postEdit');
