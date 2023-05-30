<?php

use Illuminate\Support\Facades\Route;
use bladeui\Http\Controllers\{ButtonController, IconsController, bladeuiAssetsController};

Route::name('bladeui.')->prefix('/bladeui')->group(function () {
    Route::get('icons/{style}/{icon}', IconsController::class)
        ->where('style', '(outline|solid)')
        ->name('icons');

    Route::get('button', ButtonController::class)->name('render.button');

    Route::get('assets/scripts', [BladeUIAssetsController::class, 'scripts'])->name('assets.scripts');
    Route::get('assets/styles', [BladeUIAssetsController::class, 'styles'])->name('assets.styles');
});
