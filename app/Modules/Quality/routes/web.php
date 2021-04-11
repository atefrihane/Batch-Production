<?php

Route::group(['module' => 'Quality', 'middleware' => ['web', 'auth','superadmin'], 'namespace' => 'App\Modules\Quality\Controllers'], function () {

    Route::view('qualities', 'Quality::showQualities')->name('showQualities');
    Route::view('quality/add', 'Quality::showAddQuality')->name('showAddQuality');
    Route::get('quality/{id}/update', 'QualityController@showUpdateQuality')->name('showUpdateQuality');
});
