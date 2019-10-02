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

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('dokumen/json','DokumenController@json');

Route::get('dokumen', 'DokumenController@daftardokumen');

Route::get('tambahdokumen', 'DokumenController@tambahdokumen');

Route::post('prosestambahdokumen','DokumenController@prosestambahdokumen');

Route::get('detailsm/{id_sm}','SuratMasukController@detailsuratmasuk');

Route::get('editdokumen/{id_dokumen}','DokumenController@editdokumen');

Route::post('proseseditdokumen','DokumenController@proseseditdokumen');

Route::get('hapusdokumen/{id_dokumen}','DokumenController@hapusdokumen');

Route::post('addgoodscore','ScoreController@prosesaddgoodscore');

Route::post('addpoorscore','ScoreController@prosesaddpoorscore');

Route::get('afterscoring', 'ScoreController@afterscoring');
