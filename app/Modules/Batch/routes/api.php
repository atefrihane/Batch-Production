<?php

Route::group(['module' => 'Batch', 'middleware' => ['api'], 'namespace' => 'App\Modules\Batch\Controllers'], function() {

    Route::resource('Batch', 'BatchController');

});
