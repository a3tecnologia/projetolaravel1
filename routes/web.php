<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PlanController;

/*
Route::tipo_requisição('url_da_rota', [Nome_Controller::class, 'nome_método'])->name('nome_da_rota');*/

Route::put('admin/plans/{url}', [PlanController::class, 'update'])->name('plans.update');
Route::get('admin/plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
Route::any('admin/plans/search', [PlanController::class, 'search'])->name('plans.search');
Route::delete('admin/plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
Route::post('admin/plans', [PlanController::class, 'store'])->name('plans.store');
Route::get('admin/plans/create', [PlanController::class, 'create'])->name('plans.create');
Route::get('admin/plans/{url}', [PlanController::class, 'show'])->name('plans.show');
Route::get('admin/plans', [PlanController::class, 'index'])->name('plans.index');

Route::get('admin', [PlanController::class, 'index'])->name('admin.home');

Route::get('/', function () {
    return view('welcome');
});
