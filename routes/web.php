<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjecttController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PriceController;


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
Route::get('addproject', function () {
    return view('addProject');
});
Route::get('add_project', [ProjecttController::class, 'add_project']);
Route::post('store_project', [ProjecttController::class, 'store_project']);

Route::get('add_currency', [CurrencyController::class, 'add_currency']);
Route::post('store_currency', [CurrencyController::class, 'store_currency']);


Route::get('projects', [ProjecttController::class, 'get_projects']);
Route::get('project/{id}', [ProjecttController::class, 'get_project']);

// Route::get('add_price', [CurrencyController::class, 'add_price']);
Route::post('store_price', [ProjecttController::class, 'store_price']);
Route::get('curency_conventer', [PriceController::class, 'curency_conventer']);
Route::post('currency_converter_result', [PriceController::class, 'currency_converter_result']);
Route::get('get_final_price', [PriceController::class, 'get_final_price']);


Route::get('get_all_projects', [PriceController::class, 'get_all_projects']);
Route::get('project_final_price/{id}', [PriceController::class, 'project_final_price']);
Route::post('final_price', [PriceController::class, 'final_price']);


