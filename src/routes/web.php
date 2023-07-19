<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
// 修正ボタン
Route::post('/redirect', [ContactController::class, 'redirect']);
//サンクスページからindexページへ戻る
Route::get('/return', [ContactController::class, 'return']);
// 以下、管理画面の操作
Route::get('/manage', [ContactController::class, 'manage']);
Route::post('/contact/search', [ContactController::class, 'search']);
Route::get('/manage/reset', [ContactController::class, 'reset']);
Route::delete('/manage/{contact_id}', [ContactController::class, 'destroy']);