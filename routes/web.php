<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\DonorController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CommitteeController;
use App\Http\Controllers\Dashboard\BeneficiariesController;
use App\Http\Controllers\Dashboard\BenefitRequestController;
use App\Http\Controllers\Dashboard\DonationRequestController;
use App\Http\Controllers\Website\BenefitController;
use App\Http\Controllers\Website\CategoryController as WebsiteCategoryController;
use App\Http\Controllers\Website\DonationController;
use App\Http\Controllers\Website\HomeController;
use App\Models\DonationRequest;

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

// Route::get('/', function () {
//     return view('welcome');
// });
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
    Route::get('/dashboard/donor/approve/{id}', [DonorController::class, 'approve']);
    Route::get('/dashboard/donor/reject/{id}', [DonorController::class, 'reject']);
    // Route::delete('/dashboard/donor/destroy/{id}', [DonorController::class, 'destroy']);
    // Route::get('/dashboard/donor/restore/{id}', [DonorController::class, 'restore']);
    Route::post('/dashboard/donor/approve/{id}', [DonorController::class, 'approve']);
    Route::delete('/dashboard/donor/reject/{id}', [DonorController::class, 'reject']);
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
    Route::get('/dashboard/beneficiary/{id}', [BeneficiariesController::class, 'show']);
    Route::get('/dashboard/beneficiary/edit/{id}', [BeneficiariesController::class, 'edit']);
    Route::post('/dashboard/beneficiary/update/{id}', [BeneficiariesController::class, 'update']);

});

Route::middleware(['auth', 'verified'])->group(function () {
    // BenefitRequest
    Route::get('/dashboard/benefit_request', [BenefitRequestController::class, 'index']);
    Route::get('/dashboard/benefit_request/{id}', [BenefitRequestController::class, 'show']);
    Route::post('/dashboard/benefit_request/add_quantity/{id}', [BenefitRequestController::class, 'add_quantity']);
    Route::post('/dashboard/benefit_request/edit_status/{id}', [BenefitRequestController::class, 'edit_status']);
    Route::post('/dashboard/benefit_request/approve/{id}', [BenefitRequestController::class, 'approve']);
    Route::delete('/dashboard/benefit_request/reject/{id}', [BenefitRequestController::class, 'reject']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    // DonationRequest
    Route::get('/dashboard/donation_request', [DonationRequestController::class, 'index']);
    Route::post('/dashboard/donation_request/add_category/{id}', [DonationRequestController::class, 'add_category']);
    Route::post('/dashboard/donation_request/edit_status/{id}', [DonationRequestController::class, 'edit_status']);
    Route::get('/dashboard/donation_request/approve/{id}', [DonationRequestController::class, 'approve']);
    Route::get('/dashboard/donation_request/reject/{id}', [DonationRequestController::class, 'reject']);
});


Route::get('/', [HomeController::class , 'index'])->name('Home');

Route::get('/about', function () {
    return view('Website.about');
})->name('about');

Route::get('/categories', [WebsiteCategoryController::class , 'index'])->name('categories');
Route::get('/categories/show/{id}', [WebsiteCategoryController::class , 'show'])->name('categories.show');

Route::get('/donateNow', [DonationController::class, 'DonateNow'])->name('DonateNow');
Route::post('/DonateNowRequest', [DonationController::class, 'DonateNowRequest'])->name('DonateNowRequest');


Route::get('/benefitRequest', [BenefitController::class , 'index'])->name('benefitRequest');
Route::get('/benefitNow/{id}',[BenefitController::class, 'show'])->name('benefitNow.show');
Route::post('/benefitNow/{id}',[BenefitController::class, 'benefitRequest'])->name('benefitNow.benefitRequest');
Route::get('/benefitNow', [BenefitController::class, 'BenefitNow'])->name('BenefitNow');
Route::post('/benefitNow', [BenefitController::class, 'BenefitNowRequest'])->name('BenefitNowRequest');

// Route::get('/login', function () {
//     return view('Website.login');
// });