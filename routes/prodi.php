<?php

use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/prodi', [ProdiController::class, "index"])->name("prodi");
    Route::get('/prodi/create', [ProdiController::class, "create"])->name("prodi.create");
    Route::post('/prodi/store', [ProdiController::class, "store"])->name("prodi.store");
    Route::get('/prodi/{id}', [ProdiController::class, "show"])->name("prodi.edit");
    Route::put('/prodi/update/{id}', [ProdiController::class, "update"])->name("prodi.update");
    Route::delete('/prodi/destroy/{id}', [ProdiController::class, "destroy"])->name("prodi.delete");
});