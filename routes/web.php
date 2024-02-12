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
// TOPページに遷移
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {

    // 受電履歴一覧を表示
        Route::get('/', [App\Http\Controllers\CallController::class, 'index']);
    // 受電履歴の詳細画面に遷移
        Route::get('/callsheet', [App\Http\Controllers\CallController::class, 'callsheet']);
    // 受電履歴の登録画面に遷移
        Route::get('/register', [App\Http\Controllers\CallController::class, 'register']);
    // 受電履歴の登録
        Route::post('/callregister', [App\Http\Controllers\CallController::class, 'callregister']);

    // 物件一覧画面に遷移
        Route::get('/property', [App\Http\Controllers\CallController::class, 'property']);
    // 物件詳細画面に遷移
        Route::get('/detailproperty', [App\Http\Controllers\CallController::class, 'detailproperty']);
    // 物件の登録画面に遷移
        Route::get('/propertyregister', [App\Http\Controllers\ProController::class, 'propertyregister']);
    // 物件の登録
        Route::post('/propertyregister', [App\Http\Controllers\ProController::class, 'propertyregister']);
});
