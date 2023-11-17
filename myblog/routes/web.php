<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\FrofileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\Subcategorycontroller;

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
})->name('home');

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
        Route::get('/edite/{id}','editecategory')->name('edite');
        Route::put('/update/{id}','updatecategory')->name('Update');
        Route::delete('/delete/{id}','deletecategory')->name('delete');

    }

   

  
);

 // group of sub category route
 Route::prefix('/backend/sub-category')->name('subcategory.')->controller(Subcategorycontroller::class)->group(function(){
    Route::get('/','subcategoryview')->name('view');
    Route::post('/store','storesubcategory')->name('store');
    Route::get('/sub-category-all','subcategoryajax')->name('get');
 });



// POST GROUP
 Route::prefix('/backend/posts')->name('post.')->controller(PostController::class)->group(function(){
    Route::get('/','addpost')->name('add');
    Route::post('/store','storepost')->name('store');
    Route::get('/all-post','gettallpost')->name('getallpost');
    Route::get('/active-post','active')->name('active');

 });
