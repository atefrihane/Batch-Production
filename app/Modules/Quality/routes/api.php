<?php

Route::group(['module' => 'Quality', 'middleware' => ['api'], 'namespace' => 'App\Modules\Quality\Controllers'], function() {

    Route::resource('Quality', 'QualityController');

});
