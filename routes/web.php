<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

Auth::routes();

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cc/{username}', [App\Http\Controllers\HomeController::class, 'show']);

Route::get('/p/{url}', [App\Http\Controllers\PostsController::class, 'index']);

Route::get('/createpost', [App\Http\Controllers\PostsController::class, 'create'])->name('createpost');

Route::post('/createpost', [App\Http\Controllers\PostsController::class, 'store']);

Route::get('/postlist', [App\Http\Controllers\PostsController::class, 'show'])->name('user.postlist');

Route::delete('/postlist/{id}', [App\Http\Controllers\PostsController::class, 'destroy'])->name('delpost');

Route::put('/postlist/{id}', [App\Http\Controllers\PostsController::class, 'update']);

Route::post('/edit/{id}',[App\Http\Controllers\PostsController::class, 'edit'])->name('postedit');
Route::get('/edit/{id}', function () {
    abort(404);
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++

Route::get('/admin',[App\Http\Controllers\AdminController::class, 'index'])->name('adminpanel');

Route::get('/admin/allposts',[App\Http\Controllers\PostsController::class, 'adminallposts'])->name('adminpanel.allposts');//
Route::delete('/admin/allposts/{id}',[App\Http\Controllers\PostsController::class, 'destroy']);


Route::get('/admin/createpost',[App\Http\Controllers\PostsController::class, 'admincreate'])->name('adminpanel.createpost');
Route::post('/admin/createpost',[App\Http\Controllers\PostsController::class, 'adminstore']);



Route::get('/admin/allusers',[App\Http\Controllers\UserController::class, 'allusers'])->name('adminpanel.userlist'); //
Route::get('/admin/edituser/{id}',[App\Http\Controllers\UserController::class, 'edit'])->name('adminpanel.edituser'); ////////
Route::put('/admin/allusers/{id}',[App\Http\Controllers\UserController::class, 'update']); ////////
Route::delete('/admin/allusers/{id}',[App\Http\Controllers\UserController::class, 'destroy']);


Route::get('/admin/createuser',[App\Http\Controllers\UserController::class, 'create'])->name('adminpanel.createuser'); //
Route::post('/admin/createuser',[App\Http\Controllers\UserController::class, 'store'])->name('adminpanel.register');

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Route::get('/test', function () {
    
// });



