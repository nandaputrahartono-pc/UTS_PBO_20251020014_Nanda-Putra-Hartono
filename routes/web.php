<?php

use App\Http\Controllers\UkmKsmController;
use Illuminate\Support\Facades\Route;

Route::get('/ukm-ksm', [UkmKsmController::class, 'index'])->name('ukm-ksm.index');
Route::get('/ukm-ksm/create', [UkmKsmController::class, 'create'])->name('ukm-ksm.create');
Route::post('/ukm-ksm', [UkmKsmController::class, 'store'])->name('ukm-ksm.store');
Route::get('/ukm-ksm/{kode}', [UkmKsmController::class, 'show'])->name('ukm-ksm.show');
Route::get('/ukm-ksm/{kode}/edit', [UkmKsmController::class, 'edit'])->name('ukm-ksm.edit');
Route::put('/ukm-ksm/{kode}', [UkmKsmController::class, 'update'])->name('ukm-ksm.update');
Route::delete('/ukm-ksm/{kode}', [UkmKsmController::class, 'destroy'])->name('ukm-ksm.destroy');
