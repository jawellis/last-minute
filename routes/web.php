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
// Show all notices incl. added ones
Route::get('/noticeBoard', [NoticesController::class, 'show']);

//Show all notices
Route::resource('noticeBoard', NoticesController::class);
//Route::get('/noticeBoard', [PagesController::class, 'noticeBoard']);
//Route::get('/notices', function () {
//    return view('pages.notices', [
//        'notices' => Notice::all()
//    ]);
//});

// filter
Route::get('filter', [NoticesController::class, 'filter']);


//CRUD for single notice (logged in user)
Route::get('createNotice', [NoticesController::class, 'create']);







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
