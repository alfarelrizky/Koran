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
    route::get('/media', 'AdministratorController@media')->name('admin.list_media');
    route::get('/mediaapi','AdministratorController@mediaapi')->name('admin.list_media_api');
    route::post('/media/tambah','AdministratorController@tambah_media')->name('admin.tambah_media');
    route::get('/media/route_edit/{sample:id}', 'AdministratorController@route_edit_media')->name('admin.tambah_media');
    route::patch('/media/proses_edit/{sample:id}','AdministratorController@edit_media')->name('admin.proses_edit_media');
    route::delete('/media/hapus/{sample:id}','AdministratorController@hapus_media')->name('admin.hapus_media');

    // category&tag
    route::get('/category_tag','AdministratorController@category_tag')->name('admin.category_tag');
    route::get('/category_api', 'AdministratorController@category_api')->name('admin.category_tag_api');
    route::post('/category_tambah', 'AdministratorController@category_tambah')->name('admin.category_tambah');
    route::get('/category_route_edit/{sample:id}', 'AdministratorController@category_route_edit')->name('admin.category_route_edit');
    route::patch('/category_edit/{sample:id}', 'AdministratorController@category_edit')->name('admin.category_edit');
    route::delete('/category_hapus/{sample:id}', 'AdministratorController@category_hapus')->name('admin.category_hapus');

    // category&tag
    route::get('/tag_api', 'AdministratorController@tag_api')->name('admin.tag_tag_api');
    route::post('/tag_tambah', 'AdministratorController@tag_tambah')->name('admin.tag_tambah');
    route::get('/tag_route_edit/{sample:id}', 'AdministratorController@tag_route_edit')->name('admin.tag_route_edit');
    route::patch('/tag_edit/{sample:id}', 'AdministratorController@tag_edit')->name('admin.tag_edit');
    route::delete('/tag_hapus/{sample:id}', 'AdministratorController@tag_hapus')->name('admin.tag_hapus');

    route::get('/user', 'AdministratorController@user')->name('admin.user');
    route::get('/user_api', 'AdministratorController@user_api')->name('admin.user_api');
    route::post('/user_tambah', 'AdministratorController@user_tambah')->name('admin.user_tambah');
    route::get('/user_route_edit/{sample:id}','AdministratorController@user_route_edit')->name('admin.user_route_edit');
    route::patch('/user_edit/{sample:id}', 'AdministratorController@user_edit')->name('admin.user_edit');
    route::delete('/user_hapus/{sample:id}','AdministratorController@user_hapus')->name('admin.user_hapus');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
