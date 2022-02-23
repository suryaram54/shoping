<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\BrandController;
use App\models\User;


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
Route::get('/home', function () {
   echo 'surya prakash';
});
Route::get('/about', [aboutController::class, 'index'])->middleware('age');
Route::get('/category/all', [categoryController::class, 'AllCat'])->name('all.category');
Route::POST('/category/add', [categoryController::class, 'Addcat'])->name('store.category');
Route::get('/category/edit/{id}', [categoryController::class, 'Edit']);
Route::POST('/category/update/{id}', [categoryController::class, 'update']);
Route::get('/softdelete/category/{id}', [categoryController::class, 'softdelete']);
Route::get('/category/restore/{id}', [categoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [categoryController::class, 'pDelete']);

////for Brand///
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::POST('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::POST('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

/////// multi image///

Route::get('/multi_image/all', [BrandController::class, 'Multipic'])->name('multi_image');
Route::POST('/multi/add', [BrandController::class, 'storeImg'])->name('store.image');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    $users=User::all();
    return view('dashboard',compact('users'));
})->name('dashboard');
