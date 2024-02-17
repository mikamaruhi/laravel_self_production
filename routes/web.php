<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// ログインが必要なページのルートを定義する
Route::group(['middleware' => 'auth'], function () {
    // ユーザー一覧ページを表示
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
    // ユーザー編集ページのルート
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'edit']);
    Route::put('/profile', [App\Http\Controllers\UserController::class, 'update']);

// TOPページに遷移
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
    Route::prefix('items')->group(function () {   
    // 受電履歴の検索結果一覧を表示
        Route::post('/', [App\Http\Controllers\CallController::class, 'indexsearch']);
    // 受電履歴一覧を表示
        Route::get('/', [App\Http\Controllers\CallController::class, 'index']);
    // 受電履歴の詳細画面に遷移
        Route::get('/callchange/{id}', [App\Http\Controllers\CallController::class, 'callchange']);
    // 受電履歴の登録画面に遷移
        Route::get('/register', [App\Http\Controllers\CallController::class, 'register']);
    // 受電の登録
        Route::post('/callregister', [App\Http\Controllers\CallController::class, 'callregister']);

    // 物件一覧画面に遷移
        Route::get('/propertysheet', [App\Http\Controllers\ProController::class, 'property']);
    // 物件詳細画面に遷移
        Route::get('/detailproperty', [App\Http\Controllers\ProController::class, 'detailproperty']);
    // 物件の登録画面に遷移
        Route::get('/propertyregister', [App\Http\Controllers\ProController::class, 'propertyregister']);
    // 物件の登録
        Route::post('/propertyaddregister', [App\Http\Controllers\ProController::class, 'propertyaddregister']);
    });
});