<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaintJobController;

Route::get('/paint_jobs', [PaintJobController::class, 'index'])->name('paint_jobs.index');
Route::post('/paint_jobs', [PaintJobController::class, 'store'])->name('paint_jobs.store');
Route::put('/paint_jobs/{paintJob}', [PaintJobController::class, 'markAsDone'])->name('paint_jobs.mark_as_done');
