<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Reportings', route('showHome'));
});
// Country
Breadcrumbs::for('countries', function ($trail) {
    $trail->push('Countries', route('showCountries'));
});

Breadcrumbs::for('addCountry', function ($trail) {
    $trail->parent('countries', route('showCountries'));
    $trail->push('Add a country');
});

Breadcrumbs::for('updateCountry', function ($trail, $country) {
    $trail->parent('countries', route('showCountries'));
    $trail->push($country->name);
    $trail->push('Update a country');
});

// Category
Breadcrumbs::for('categories', function ($trail) {
    $trail->push('Categories', route('showCategories'));
});

Breadcrumbs::for('addCategory', function ($trail) {
    $trail->parent('categories', route('showCategories'));
    $trail->push('Add a category');
});

Breadcrumbs::for('updateCategory', function ($trail, $category) {
    $trail->parent('categories', route('showCategories'));
    $trail->push($category->name);
    $trail->push('Update a category');
});

// Quality
Breadcrumbs::for('qualities', function ($trail) {
    $trail->push('Qualities', route('showQualities'));
});

Breadcrumbs::for('addQuality', function ($trail) {
    $trail->parent('qualities', route('showQualities'));
    $trail->push('Add a quality');
});

Breadcrumbs::for('updateQuality', function ($trail, $quality) {
    $trail->parent('qualities', route('showQualities'));
    $trail->push($quality->name);
    $trail->push('Update a quality');
});

// Batch
Breadcrumbs::for('batches', function ($trail) {
    $trail->push('Room 1', route('showBatches'));
});

Breadcrumbs::for('showRoomTwoBatches', function ($trail) {
    $trail->push('Room 2', route('showRoomTwoBatches'));
});

Breadcrumbs::for('showRoomThreeBatches', function ($trail) {
    $trail->push('Room 3', route('showRoomThreeBatches'));
});

Breadcrumbs::for('addBatch', function ($trail) {
    $trail->parent('batches', route('showBatches'));
    $trail->push('Add a batch');
});

Breadcrumbs::for('updateBatch', function ($trail, $batch) {
    $trail->parent('batches');
    $trail->push($batch->name);
    $trail->push('Update a batch');

});

// SubBatch
// Breadcrumbs::for('subBatches', function ($trail, $batch) {
//     $trail->parent('batches');
//     if ($batch->parent) {

//         $trail->push($batch->parent->name, route('showManageSubBatches', $batch->parent->id));

//     }

//     $trail->push($batch->name);
//     $trail->push('sub batches', route('showManageSubBatches', $batch->id));

// });

// Breadcrumbs::for('batchQualities', function ($trail, $batch) {
//     $trail->parent('batches');
//     if ($batch->parent) {

//         $trail->push($batch->parent->name, route('showManageSubBatches', $batch->parent->id));

//     }

//     $trail->push($batch->name);
//     $trail->push('qualities');

// });

// Breadcrumbs::for('addBatchQuality', function ($trail, $batch) {
//     $trail->parent('batchQualities', $batch);
//     $trail->push('Add quality');

// });

// Breadcrumbs::for('addSubBatch', function ($trail, $batch) {
//     $trail->parent('subBatches', $batch);
//     $trail->push('Add a season sort batch');
// });

Breadcrumbs::for('updateBatchRoomTwo', function ($trail, $batch) {

    $trail->parent('showRoomTwoBatches');
    $trail->push('update a batch ');
    $trail->push($batch->name);

});

Breadcrumbs::for('updateBatchRoomThree', function ($trail, $batch) {

    $trail->parent('showRoomThreeBatches');
    $trail->push('update a batch ');
    $trail->push($batch->name);

});

// Batch
Breadcrumbs::for('extraBatches', function ($trail) {
    $trail->push('Extra batches', route('showExtraBatches'));
});

Breadcrumbs::for('addExtraBatch', function ($trail) {
    $trail->parent('extraBatches');
    $trail->push('Add extra batch');
});

Breadcrumbs::for('updateExtraBatch', function ($trail, $extraBatch) {
    $trail->parent('extraBatches');
    $trail->push($extraBatch->name);
    $trail->push('Update extra batch');

});

Breadcrumbs::for('substractBatchStepOne', function ($trail, $substractBatchStepOne) {
    $trail->parent('batches');
    $trail->push($substractBatchStepOne->name);
    $trail->push('Substract batch');

});

Breadcrumbs::for('substractBatchStepTwo', function ($trail, $substractBatchStepTwo) {
    $trail->parent('showRoomTwoBatches');
    $trail->push($substractBatchStepTwo->name);
    $trail->push('Substract batch');

});

// Pricing
Breadcrumbs::for('pricings', function ($trail) {
    $trail->push('Pricings', route('showPricings'));
});

Breadcrumbs::for('addPricing', function ($trail) {
    $trail->parent('pricings', route('showPricings'));
    $trail->push('Add a pricing');
});

Breadcrumbs::for('updatePricing', function ($trail, $pricing) {
    $trail->parent('pricings');
    $trail->push($pricing->name);
    $trail->push('Update a pricing');
});

// Season
Breadcrumbs::for('seasons', function ($trail) {
    $trail->push('Seasons', route('showSeasons'));
});

Breadcrumbs::for('addSeason', function ($trail) {
    $trail->parent('seasons', route('showSeasons'));
    $trail->push('Add a season');
});

Breadcrumbs::for('updateSeason', function ($trail, $season) {
    $trail->parent('seasons');
    $trail->push($season->name);
    $trail->push('Update a season');
});

// User
Breadcrumbs::for('users', function ($trail) {
    $trail->push('Users', route('showUsers'));
});

Breadcrumbs::for('addUser', function ($trail) {
    $trail->parent('users');
    $trail->push('Add a user');
});

Breadcrumbs::for('updateUser', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user->formatName());
    $trail->push('Update a user');
});

// Roooms
Breadcrumbs::for('roomOne', function ($trail) {
    $trail->parent('home');
    $trail->push('Room 1');
});

Breadcrumbs::for('roomTwo', function ($trail) {
    $trail->parent('home');
    $trail->push('Room 2');
});

Breadcrumbs::for('roomThree', function ($trail) {
    $trail->parent('home');
    $trail->push('Room 3');
});

Breadcrumbs::for('roomFour', function ($trail) {
    $trail->parent('home');
    $trail->push('Room 4');
});

// Reselled
Breadcrumbs::for('reselledBatches', function ($trail) {

    $trail->push('Reselled Batches',route('showReselledBatches'));
});

Breadcrumbs::for('showAddReselled', function ($trail,$batch) {
    $trail->parent('batches');
    $trail->push($batch->name);
    $trail->push('Add a reselled batchs');
});

Breadcrumbs::for('showUpdateReselledBatch', function ($trail,$batch) {
    $trail->parent('reselledBatches');
    $trail->push($batch->name);
    $trail->push('Update reselled batch');
});