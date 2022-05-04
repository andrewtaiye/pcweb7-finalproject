<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserRoleController;
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
Route::get('/home/{roleId}', [HomeController::class, 'roleSelect'])->name('roleSelect');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/postCreate', [ProfileController::class, 'postCreate'])->name('profile.postCreate');
Route::post('/profile/postEdit', [ProfileController::class, 'postEdit'])->name('profile.postEdit');

Route::get('/userRole/create', [UserRoleController::class, 'create'])->name('userRole.create');
Route::post('/userRole/postCreate', [UserRoleController::class, 'postCreate'])->name('userRole.postCreate');
Route::get('/userRole/{roleId}/edit', [UserRoleController::class, 'edit'])->name('userRole.edit');
Route::post('/userRole/{roleId}/postEdit', [UserRoleController::class, 'postEdit'])->name('userRole.postEdit');
Route::post('/userRole/{roleId}/delete', [UserRoleController::class, 'delete'])->name('userRole.delete');

Route::get('/assessment/{roleId}/create', [AssessmentController::class, 'create'])->name('assessment.create');
Route::post('/assessment/{roleId}/postCreate', [AssessmentController::class, 'postCreate'])->name('assessment.postCreate');
Route::get('/assessment/{roleId}/{assessmentId}/edit', [AssessmentController::class, 'edit'])->name('assessment.edit');
Route::post('/assessment/{roleId}/{assessmentId}/postEdit', [AssessmentController::class, 'postEdit'])->name('assessment.postEdit');
Route::post('/assessment/{roleId}/{assessmentId}/delete', [AssessmentController::class, 'delete'])->name('assessment.delete');
