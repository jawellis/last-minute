<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\NoticesController;
use App\Models\Notice;
use Illuminate\Http\Request;
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

//1.    Welcome page
Route::get('/', [PagesController::class, 'index']);

//1.    Notice board
//Show all notices
//Route::get('/noticeBoard', [PagesController::class, 'noticeBoard']);
//Route::get('/notices', function () {
//    return view('pages.notices', [
//        'notices' => Notice::all()
//    ]);
//});

//CRUD for single notice (logged in user)
Route::resource('noticeBoard', NoticesController::class);


// 2.   Profile page
//Show user profile
//Route::get('/noticeBoard/{id}', [PagesController::class, 'profile']);
//Route::get('/notices/{id}', function($id){
//    return view('pages.profile', [
//        'notice' => Notice::find($id)
//    ]);
//});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
