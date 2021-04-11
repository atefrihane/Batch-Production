<?php

Route::group(['module' => 'Season', 'middleware' => ['web', 'auth','superadmin'], 'namespace' => 'App\Modules\Season\Controllers'], function () {

    //Livewire components rendered for view routes
    Route::view('seasons', 'Season::showSeasons')->name('showSeasons');
    Route::view('season/add', 'Season::showAddSeason')->name('showAddSeason');
    Route::get('season/{id}/update', 'SeasonController@showUpdateSeason')->name('showUpdateSeason');

});
