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
    // 社員一覧ページを表示
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    // 社員編集ページを表示
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    // 社員編集
    Route::post('/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    // 社員削除
    // Route::delete('/edit/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('users.destroy');
   
// TOPページに遷移
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
    Route::prefix('items')->group(function () {   
    // 受電履歴一覧を表示
        Route::get('/', [App\Http\Controllers\CallController::class, 'index']);
    // 受電履歴の詳細画面に遷移
        Route::get('/callchange/{id}', [App\Http\Controllers\CallController::class, 'callchange']);
    // 受電履歴の一部編集
        Route::post('/callchange/{id}', [App\Http\Controllers\CallController::class, 'update'])->name('callupdate');
    // 詳細画面の削除ボタンを押したあとのルート
        Route::delete('/call/{id}', [App\Http\Controllers\CallController::class, 'destroy'])->name('call.destroy');  
    // 受電履歴の登録画面に遷移
    Route::get('/register', [App\Http\Controllers\CallController::class, 'register']);
    // 受電の登録
        Route::post('/callregister', [App\Http\Controllers\CallController::class, 'callregister']);
    // 受電履歴の検索結果一覧を表示
        Route::post('/indexsearch', [App\Http\Controllers\CallController::class, 'indexsearch'])->name('items.indexsearch');



    // 物件一覧画面に遷移
        Route::get('/propertysheet', [App\Http\Controllers\ProController::class, 'property']);
    // 物件詳細画面に遷移
        Route::get('/detailproperty/{id}', [App\Http\Controllers\ProController::class, 'detailproperty']);
    // 詳細画面の削除ボタンを押したあとのルート
        Route::delete('/property/{id}', [App\Http\Controllers\ProController::class, 'destroy'])->name('property.destroy');  
    // 物件の登録画面に遷移
        Route::get('/propertyregister', [App\Http\Controllers\ProController::class, 'propertyregister']);
    // 物件の登録
        Route::post('/propertyaddregister', [App\Http\Controllers\ProController::class, 'propertyaddregister']);
    // 受電履歴の検索結果一覧を表示
        Route::post('/propertysheet/search', [App\Http\Controllers\ProController::class, 'search'])->name('property.search');

    });
});