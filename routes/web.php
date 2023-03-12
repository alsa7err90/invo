<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\QrcodeController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\SurnameController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
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

 
Route::get('/', [PublicController::class,'welcome']);
Route::post('/', [PublicController::class,'new_invo']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
 
// for admin
Route::group(['middleware' => ['auth','permission:view_dashboard']], function () {
    Route::resource('invitations', InvitationController::class);
    Route::resource('surnames', SurnameController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('tables', TableController::class);
    Route::resource('users', UserController::class)->middleware('permission:user_management');
    Route::resource('qrcode', QrcodeController::class)->middleware('permission:qrcode');
    Route::get('new/qrcode', [QrcodeController::class,'new_qrcode'])->name('new_qrcode') ;
    
    Route::get('profile/myProfile', [UserController::class, 'myProfile'])->name('profile.myProfile');
    Route::post('profile/updateMyProfile', [UserController::class, 'updateMyProfile'])->name('profile.updateMyProfile');
   
    Route::get('invitation/attentions', [InvitationController::class, 'attentions'])->name('invitations.attentions');
    Route::post('send/attentions', [InvitationController::class, 'sendAttentions'])->name('send.attentions');
   
    Route::get('invitation/public', [InvitationController::class, 'public'])->name('invitations.public');
    Route::get('table/empty', [TableController::class, 'empty'])->name('tables.empty');
    Route::get('table/report', [TableController::class, 'report'])->name('tables.report');

    // search invitation
    Route::any('search/attentions', [SearchController::class, 'searchAttentions'])->name('search.attentions');
    Route::any('search/public', [SearchController::class, 'searchPublic'])->name('search.public');
    Route::any('search/all', [SearchController::class, 'searchAll'])->name('search.all');
   
    Route::any('search/table', [SearchController::class, 'searchTable'])->name('search.table');

    // excel
    
    Route::get('invitation/exportAll', [InvitationController::class, 'exportAll'])->name('invitations.exportAll');
    Route::get('invitation/exportPublic', [InvitationController::class, 'exportPublic'])->name('invitations.exportPublic');
    Route::get('invitation/exportAtt', [InvitationController::class, 'exportAtt'])->name('invitations.exportAtt');
    
    Route::get('invitation/print/{id}', [InvitationController::class, 'print'])->name('invitations.print');
    Route::get('user/permissions/{id}/edit', [UserController::class, 'permissions'])->name('users.permissions');
    Route::post('user/permissions/{id}', [UserController::class, 'permissions_update'])->name('users.permissions_update');
     
    
});
