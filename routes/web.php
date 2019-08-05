<?php

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
Route::post('/quiz','ApiCRUD@show_quiz')->name('show_quiz');
Route::post('/records','ApiCRUD@get_all_records')->name('get_all_recs');
Route::post('/records_add','ApiCRUD@set_record')->name('rec_add');
Route::get('/records_add','ApiCRUD@show_stat');
Route::post('filter_records','ApiCRUD@filter_records')->name('filter_rec');
Route::get('/stat','ApiCRUD@show_stat')->name('search');
