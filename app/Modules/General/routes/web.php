<?php

Route::group(['module' => 'General', 'middleware' => ['web', 'stepFour'], 'namespace' => 'App\Modules\General\Controllers'], function () {

    Route::view('rooms/first', 'General::showRoomOneStatistics')->name('showRoomOneStatistics');
    Route::view('rooms/second', 'General::showRoomTwoStatistics')->name('showRoomTwoStatistics');
    Route::view('rooms/third', 'General::showRoomThreeStatistics')->name('showRoomThreeStatistics');
    Route::view('rooms/fourth', 'General::showRoomFourStatistics')->name('showRoomFourStatistics');
});
