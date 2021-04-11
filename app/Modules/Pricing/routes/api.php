<?php

Route::group(['module' => 'Pricing', 'middleware' => ['api'], 'namespace' => 'App\Modules\Pricing\Controllers'], function() {

    Route::resource('Pricing', 'PricingController');

});
