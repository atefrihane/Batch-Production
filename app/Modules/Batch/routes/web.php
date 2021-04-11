<?php

// shared routes
Route::group(['module' => 'Batch', 'middleware' => ['web', 'auth'], 'namespace' => 'App\Modules\Batch\Controllers'], function () {

    Route::view('room/1', 'Batch::showBatches')->name('showBatches');
    Route::view('room/2', 'Batch::showRoomTwoBatches')->name('showRoomTwoBatches');
    Route::view('room/3', 'Batch::showRoomThreeBatches')->name('showRoomThreeBatches');
    // Route::get('batch/{id}/manage', 'BatchController@showManageSubBatches')->name('showManageSubBatches');

    Route::get('batch/{id}/qualities', 'BatchController@showBatchQualities')->name('showBatchQualities');
    Route::get('batch/{id}/print', 'BatchController@showBatchToPrint')->name('showBatchToPrint');
 
    Route::view('batches/extra', 'Batch::showExtraBatches')->name('showExtraBatches');
    Route::view('batches/reselled', 'Batch::showReselledBatches')->name('showReselledBatches');
});

//Step 1 routes

Route::group(['module' => 'Batch', 'middleware' => ['web', 'auth', 'stepOne'], 'namespace' => 'App\Modules\Batch\Controllers'], function () {
   
    Route::view('batch/add', 'Batch::showAddBatch')->name('showAddBatch');
    Route::get('room/1/batch/{id}/update', 'BatchController@showUpdateBatchRoomOne')->name('showUpdateBatchRoomOne');
    Route::get('room/1/batch/{id}/substract', 'BatchController@showSubstractBatch')->name('showSubstractBatch');
   
});

//Step 2 routes
Route::group(['module' => 'Batch', 'middleware' => ['web', 'auth', 'stepTwo'], 'namespace' => 'App\Modules\Batch\Controllers'], function () {

    Route::get('batch/{id}/sub/add', 'BatchController@showAddSubBatch')->name('showAddSubBatch');
    Route::get('room/2/batch/{id}/update', 'BatchController@showUpdateBatchRoomTwo')->name('showUpdateBatchRoomTwo');
    Route::get('room/2/batch/{id}/substract', 'BatchController@showSubstractBatchRoomTwo')->name('showSubstractBatchRoomTwo');

});

//Step 3 routes
Route::group(['module' => 'Batch', 'middleware' => ['web', 'auth', 'stepThree'], 'namespace' => 'App\Modules\Batch\Controllers'], function () {
   
    Route::get('room/3/batch/{id}/update', 'BatchController@showUpdateBatchRoomThree')->name('showUpdateBatchRoomThree');


});

//Step 4 routes

Route::group(['module' => 'Batch', 'middleware' => ['web', 'auth', 'stepFour'], 'namespace' => 'App\Modules\Batch\Controllers'], function () {

    Route::view('batch/extra/add', 'Batch::showAddExtraBatch')->name('showAddExtraBatch');

    Route::view('batch/{id}/extra/update', 'Batch::showUpdateExtraBatch')->name('showUpdateExtraBatch');
    Route::get('batch/{id}/resell/add', 'BatchController@showAddReselledBatch')->name('showAddReselledBatch');
    Route::get('batch/{id}/resell/update', 'BatchController@showUpdateReselledBatch')->name('showUpdateReselledBatch');
});
