<?php

Route::group(['module' => 'Pricing', 'middleware' => ['web','auth','superadmin'], 'namespace' => 'App\Modules\Pricing\Controllers'], function() {

     //Livewire components rendered for view routes
     Route::view('pricings', 'Pricing::showPricings')->name('showPricings');
     Route::view('pricing/add', 'Pricing::showAddPricing')->name('showAddPricing');
     Route::get('pricing/{id}/update', 'PricingController@showUpdatePricing')->name('showUpdatePricing');

});
