<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\FrofileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('frontendlayout.home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//For frofile route
Route::get('/user-profile',[FrofileController::class, 'frofile'])->name("userfrofile");

Route::put('/profile-update',[FrofileController::class, 'frofileupdate'])->name('profile.update');

Route::put('/password-update',[FrofileController::class, 'passwordupdatte'])->name('password.update');

// group of Route
Route::prefix('backend/categores')->name('category.')->controller(CategoryController::class)->group(
    function(){
        Route::get('/', 'viewcategory')->name('show');
        Route::post('/store','storecategory')->name('store');

    }
);

