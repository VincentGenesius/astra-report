<?php

use App\Http\Controllers\Supervisor\AreaController;
use App\Http\Controllers\Supervisor\DealerController;
use App\Http\Controllers\Supervisor\DepartmentController;
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

Route::name('departments.')->prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index'])->name('index');
    Route::get('/create', [DepartmentController::class, 'create'])->name('create');
    Route::post('/', [DepartmentController::class, 'store'])->name('store');
    Route::get('/{department}', [DepartmentController::class, 'show'])->name('show');
    Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('edit');
    Route::put('/{department}', [DepartmentController::class, 'update'])->name('update');
    Route::delete('/{department}', [DepartmentController::class, 'destroy'])->name('destroy');
});

Route::name('areas.')->prefix('areas')->group(function () {
    Route::get('/', [AreaController::class, 'index'])->name('index');
    Route::get('/create', [AreaController::class, 'create'])->name('create');
    Route::post('/', [AreaController::class, 'store'])->name('store');
    Route::get('/{area}', [AreaController::class, 'show'])->name('show');
    Route::get('/{area}/edit', [AreaController::class, 'edit'])->name('edit');
    Route::put('/{area}', [AreaController::class, 'update'])->name('update');
    Route::delete('/{area}', [AreaController::class, 'destroy'])->name('destroy');
});

Route::name('tasks.')->prefix('tasks')->group(function () {
    // Route::get('/', [TaskController::class, 'index'])->name('index');
    // Route::get('/create', [TaskController::class, 'create'])->name('create');
    // Route::post('/', [TaskController::class, 'store'])->name('store');
    // Route::get('/{task}', [TaskController::class, 'show'])->name('show');
    // Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');
    // Route::put('/{task}', [TaskController::class, 'update'])->name('update');
    // Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
});

