<?php

Route::group(['module' => 'General', 'middleware' => ['api'], 'namespace' => 'App\Modules\General\Controllers' , 'prefix' => 'api'], function() {

    Route::get('/statistics', 'GeneralControllerApi@handleGetStatistics');

});
