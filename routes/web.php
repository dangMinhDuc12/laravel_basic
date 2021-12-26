<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact-page');


Route::get('/middleware', function () {
    echo 'Hello from middleware';
})->middleware('checkAge');

//Category Routes
Route::get('/category/all', [CategoryController::class, 'showAllCategory'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('store.category');
Route::get('category/edit/{id}', [CategoryController::class, 'editCategory']);
Route::put('/category/update/{id}', [CategoryController::class, 'updateCategory']);
Route::get('/category/soft-delete/{id}', [CategoryController::class, 'softDeleteCategory']);
Route::get('/category/restore/{id}', [CategoryController::class, 'restoreCategory']);
Route::get('/category/force-delete/{id}', [CategoryController::class, 'forceDeleteCategory']);

//Brand Routes
Route::get('/brand/all', [BrandController::class, 'showAllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'addBrand'])->name('store.brand');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('dashboard', compact('users'));
})->name('dashboard');
