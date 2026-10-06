<?php

use App\Http\Controllers\Supervisor\DealerController;
use Illuminate\Support\Facades\Route;

Route::name('dealers.')->prefix('dealers')->group(function () {
    Route::get('/', [DealerController::class, 'index'])->name('index');
    Route::get('/create', [DealerController::class, 'create'])->name('create');
    Route::post('/', [DealerController::class, 'store'])->name('store');
    Route::get('/{dealer}', [DealerController::class, 'show'])->name('show');
    Route::get('/{dealer}/edit', [DealerController::class, 'edit'])->name('edit');
    Route::put('/{dealer}', [DealerController::class, 'update'])->name('update');
    Route::delete('/{dealer}', [DealerController::class, 'destroy'])->name('destroy');
});
