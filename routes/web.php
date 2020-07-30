<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return redirect('news/');
});

// news
Route::prefix('news')->group(function() {
    // news
    Route::get('/','NewsController@index')->name('news.index');
    Route::get('/detail/{sample:id}', 'NewsController@detail')->name('news.detail');
    Route::get('/search', 'NewsController@search')->name('news.search');
    // filter category
    route::get('/filtercategory/{sample:id}','CategoryController@filter')->name('category.filter');
    // filter Tag
    route::get('/filterTag/{sample:id}','TagController@filter')->name('tag.filter');

});

// admin
route::prefix('admin')->middleware('auth')->group(function(){

    //berita
    route::get('/','AdministratorController@index')->name('admin.index');
    route::get('/list_berita', 'AdministratorController@list_berita')->name('admin.list_berita');
    route::get('/list_berita_api', 'AdministratorController@list_berita_api')->name('admin.list_berita_api');
    route::post('/list_berita/tambah', 'AdministratorController@tambah_berita')->name('admin.tambah_berita');
    route::get('/list_berita/edit/{sample:id}','AdministratorController@route_edit_berita')->name('admin.edit_berita');
    route::patch('/list_berita/prosesedit/{sample:id}','AdministratorController@edit_berita')->name('admin.proses_edit_berita');
    route::delete('/list_berita/hapus/{sample:id}','AdministratorController@hapus_list_berita')->name('admin.hapus_berita');

    // media
    route::get('/media','AdministratorController@media')->name('admin.list_media');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
