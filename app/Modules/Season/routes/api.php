<?php

Route::group(['module' => 'Season', 'middleware' => ['api'], 'namespace' => 'App\Modules\Season\Controllers'], function() {

    Route::resource('Season', 'SeasonController');

});
