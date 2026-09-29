<?php

use Illuminate\Support\Facades\Route;

Route::name('dealers.')->prefix('dealers')->group(function () {
    Route::get('/', [DealerController::class, 'index'])->name('index');
    Route::get('/create', [DealerController::class, 'create'])->name('create');
    Route::get('/{id}', [DealerController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [DealerController::class, 'edit'])->name('edit');
    Route::post('/', [DealerController::class, 'store'])->name('store');
    Route::put('/{id}', [DealerController::class, 'update'])->name('update');
    Route::delete('/{id}', [DealerController::class, 'destroy'])->name('destroy');
});
