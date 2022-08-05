<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ProController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SliderController;
use App\Models\Category;

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
Route::get('/home', function () {
    return view('home');
});
Route::get('/cat', function () {
    return view('category');
});
//Category Routes
Route::post('/cat', [CatController::Class,'SaveCategory']);
Route::any('/view', [CatController::Class,'ViewCategory']);
Route::any('/search/{search_term}', [CatController::Class,'SearchCategory']);
Route::get('/getCat/{id}', [CatController::Class,'GetCategory']);
Route::delete('/del/{id}', [CatController::Class,'DelCategory']);
Route::put('/update', [CatController::Class,'UpdateCategory'])->name('update.cat');

Route::get('/pro', function () {
    return view('product');
});

//Products Routes
Route::post('/pro', [ProController::Class,'SaveProduct']);
Route::any('/viewPro', [ProController::Class,'ViewProduct']);
Route::any('/loadCat', [ProController::Class,'LoadCategory']);
Route::any('/loadCatEdit/{search_term}', [ProController::Class,'LoadCategoryEdit']);
Route::any('/searchPro/{search_term}', [ProController::Class,'SearchProduct']);
Route::delete('/delPro/{id}', [ProController::Class,'DelProduct']);
Route::get('/getPro/{id}', [ProController::Class,'GetProduct']);
Route::put('/updatePro', [ProController::Class,'UpdateProduct'])->name('update.pro');

Route::get('/sharePDF/{id}', [ProController::Class,'ShareProductPdf']);


//Task1 Routes
Route::any('/task2', [TaskController::Class,'ImageView']);

Route::get('/task1', function () {
    return view('task1');
});

Route::post('/uploadImage', [TaskController::Class,'ImageUpload'])->name('UploadImage');

Route::any('/viewImage', [SliderController::Class,'ImageView'])->name('ViewImage');

// Route::get('/slider', function () {
//     return view('slider');
// });

Route::get('/slider', [SliderController::Class,'slider'])->name('slider');


//Timetable Routes
Route::get('/timetable', function () {
    return view('timetable');
});