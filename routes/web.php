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
route::prefix('admin')->group(function(){
    route::get('/','AdministratorController@index')->name('admin.index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
