<?php

use App\Http\Controllers\Supervisor\DealerController;
use Illuminate\Support\Facades\Route;

Route::name('dealers.')->prefix('dealers')->group(function () {
    Route::get('/', [DealerController::class, 'index'])->name('index');
    Route::get('/create', [DealerController::class, 'create'])->name('create');
    Route::post('/', [DealerController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [DealerController::class, 'edit'])->name('edit');
    // Route::get('/{id}', [DealerController::class, 'show'])->name('show');
    // Route::put('/{id}', [DealerController::class, 'update'])->name('update');
    // Route::delete('/{id}', [DealerController::class, 'destroy'])->name('destroy');
});
