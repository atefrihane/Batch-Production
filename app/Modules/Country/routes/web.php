<?php

Route::group(['module' => 'Country', 'middleware' => ['web', 'auth','superadmin'], 'namespace' => 'App\Modules\Country\Controllers'], function () {
    //Livewire components rendered for view routes
    Route::view('countries', 'Country::showCountries')->name('showCountries');
    Route::view('country/add', 'Country::showAddCountry')->name('showAddCountry');
    Route::get('country/{id}/update', 'CountryController@showUpdateCountry')->name('showUpdateCountry');
});
