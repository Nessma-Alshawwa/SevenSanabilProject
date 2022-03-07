<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\RoleController;


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
    return view('welcome');
});
Route::middleware(['auth', 'verified'])->group(function () {
    // USERS
    Route::get('/dashboard/users', [UserController::class, 'index']);
    Route::get('/dashboard/user/create', [UserController::class, 'create']);
    Route::post('/dashboard/user/store', [UserController::class, 'store']);
    Route::get('/dashboard/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/dashboard/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/dashboard/user/destroy/{id}', [UserController::class, 'destroy']);
    Route::get('/dashboard/user/restore/{id}', [UserController::class, 'restore']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Roles
    Route::get('/dashboard/roles', [RoleController::class, 'index']);
    Route::get('/dashboard/role/create', [RoleController::class, 'create']);
    Route::post('/dashboard/role/store', [RoleController::class, 'store']);
    Route::delete('/dashboard/role/destroy/{id}', [RoleController::class, 'destroy']);
});

Route::get('/dashboard', function () {
    return view('dashboard.index', ['title'=>'']);
});

Route::get('/dashboard/donors', function () {
    return view('dashboard.donors', ['title'=>'/المتبرعين']);
});

Route::get('/dashboard/beneficiaries', function () {
    return view('dashboard.beneficiaries', ['title'=>'/المستفيدين']);
});

Route::get('/dashboard/donations', function () {
    return view('dashboard.donations', ['title'=>'/التبرعات']);
});

Route::get('/dashboard/committees', function () {
    return view('dashboard.committees', ['title'=>'/لجان الزكاة']);
});
