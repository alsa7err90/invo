<?php

use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SurnameController;
use App\Http\Controllers\Admin\TableController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// for admin
Route::group(['middleware' => ['auth']], function () {
    Route::resource('invitations', InvitationController::class);
    Route::resource('surnames', SurnameController::class);
    Route::resource('groups', SurnameController::class);
    Route::resource('tables', TableController::class);
    Route::resource('profile', UserController::class);
    Route::resource('qrcode', QrcodeController::class);

    Route::get('invitation/attentions', [InvitationController::class, 'attentions'])->name('invitations.attentions');
    Route::post('send/attentions', [InvitationController::class, 'sendAttentions'])->name('send.attentions');
   
    Route::get('invitation/public', [InvitationController::class, 'public'])->name('invitations.public');
    Route::get('table/empty', [TableController::class, 'empty'])->name('tables.empty');
    Route::get('table/report', [TableController::class, 'report'])->name('tables.report');

    // search
    Route::any('search/attentions', [SearchController::class, 'searchAttentions'])->name('search.attentions');
    Route::any('search/public', [SearchController::class, 'searchPublic'])->name('search.public');


});
