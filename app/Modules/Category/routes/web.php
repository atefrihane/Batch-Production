<?php

Route::group(['module' => 'Category', 'middleware' => ['web','auth','superadmin'], 'namespace' => 'App\Modules\Category\Controllers'], function() {

    Route::view('categories', 'Category::showCategories')->name('showCategories');
    Route::view('category/add', 'Category::showAddCategory')->name('showAddCategory');
    Route::get('category/{id}/update', 'CategoryController@showUpdateCategory')->name('showUpdateCategory');
});
