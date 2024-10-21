<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\Frontendcontroller;

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

   

Route::get('/dashboard', function () {
    return view('backend.page.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/',[Frontendcontroller::class,'index']);
Route::delete('product-delete/{id}',[Productcontroller::class,'destroy']);


Route::get('/products/create',[Productcontroller::class,'create']);
Route::get('/online/product',[Productcontroller::class,'show']);
Route::post('/product/store',[Productcontroller::class,'store']);
//edit route
Route::get('product-edit/{id}',[Productcontroller::class,'edit']);
Route::put('product-update/{id}',[Productcontroller::class,'update']);









Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
