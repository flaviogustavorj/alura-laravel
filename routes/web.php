<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return redirect('/series');
});

// Route::prefix('/series')->controller(SeriesController::class)->name('series.')->group(function(){
//     Route::get('/', "index")->name('index');
//     Route::get('/criar', "create")->name('series.create');
//     Route::post('/salvar', "store")->name('series.store');
// });

Route::controller(SeriesController::class)->group(function (){
    Route::get('/series', "index")->name('series.index');
    Route::get('/criar', "create")->name('series.create');
    Route::post('/salvar', "store")->name('series.store');
    Route::get('/{serie}', "edit")->name('series.edit');
    Route::put('/{serie}', "update")->name('series.update');
    Route::delete('/{serie}', "destroy")->name('series.destroy');
});
