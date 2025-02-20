<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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
//     return 'dfdsjhsd';
// });

// Route::get('/my_page',function (){
//     return 'this is my page' ;
// });
Route::match(['get', 'post'], '/create', 'App\Http\Controllers\TestController@create')->name('create');
Route::match(['get', 'post'],'/update/{id}', [TestController::class, 'update'])->name('update');
Route::match(['get', 'post'],'/delete/{id}', [TestController::class, 'delete'])->name('delete');
