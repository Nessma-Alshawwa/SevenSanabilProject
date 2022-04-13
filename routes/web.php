<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\DonorController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommitteeController;
use App\Http\Controllers\Dashboard\BeneficiariesController;
use App\Http\Controllers\Dashboard\BenefitRequestController;


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

Route::middleware(['auth', 'verified'])->group(function () {
    // Committees
    Route::get('/dashboard/committees', [CommitteeController::class, 'index']);
    Route::get('/dashboard/committee/create', [CommitteeController::class, 'create']);
    Route::post('/dashboard/committee/store', [CommitteeController::class, 'store']);
    Route::get('/dashboard/committee/edit/{id}', [CommitteeController::class, 'edit']);
    Route::post('/dashboard/committee/update/{id}', [CommitteeController::class, 'update']);
    Route::delete('/dashboard/committee/destroy/{id}', [CommitteeController::class, 'destroy']);
    Route::get('/dashboard/committee/restore/{id}', [CommitteeController::class, 'restore']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Donors
    Route::get('/dashboard/donors', [DonorController::class, 'index']);
    Route::get('/dashboard/donor/edit/{id}', [DonorController::class, 'edit']);
    Route::post('/dashboard/donor/update/{id}', [DonorController::class, 'update']);
    // Route::delete('/dashboard/donor/destroy/{id}', [DonorController::class, 'destroy']);
    // Route::get('/dashboard/donor/restore/{id}', [DonorController::class, 'restore']);
    Route::get('/dashboard/donor/approve/{id}', [DonorController::class, 'approve']);
    Route::get('/dashboard/donor/reject/{id}', [DonorController::class, 'reject']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Categories
    Route::get('/dashboard/categories', [CategoryController::class, 'index']);
    Route::get('/dashboard/category/create', [CategoryController::class, 'create']);
    Route::post('/dashboard/category/store', [CategoryController::class, 'store']);
    Route::get('/dashboard/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/dashboard/category/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/dashboard/category/destroy/{id}', [CategoryController::class, 'destroy']);
    Route::get('/dashboard/category/restore/{id}', [CategoryController::class, 'restore']);
});

Route::get('/dashboard', function () {
    return view('dashboard.index', ['title'=>'']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Beneficiaries
    Route::get('/dashboard/beneficiaries', [BeneficiariesController::class, 'index']);
    Route::get('/dashboard/beneficiary/edit/{id}', [BeneficiariesController::class, 'edit']);
    Route::post('/dashboard/beneficiary/update/{id}', [BeneficiariesController::class, 'update']);

});

Route::middleware(['auth', 'verified'])->group(function () {
    // BenefitRequest
    Route::get('/dashboard/benefit_request', [BenefitRequestController::class, 'index']);
});

Route::get('/dashboard/donations', function () {
    return view('dashboard.donations', ['title'=>'/التبرعات']);
});

