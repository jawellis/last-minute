<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\NoticesController;

use App\Http\Controllers\ProfileController;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

// 2.   Profile page
//Show user profile (logged in user)


// filter
Route::get('filter', [NoticesController::class, 'filter']);


//CRUD for single notice (logged in user)
Route::get('createNotice', [NoticesController::class, 'create']);

// settings
Route::get('settings', [PagesController::class, 'settings']);



Auth::routes();
Route::get('/personalProfile', [ProfileController::class, 'index']);
