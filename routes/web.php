<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PlanController;

/*
Route::tipo_requisição('url_da_rota', [Nome_Controller::class, 'nome_método'])->name('nome_da_rota');*/

Route::put('admin/plans/{url}', [PlanController::class, 'update'])->name('update');
Route::get('admin/plans/{url}/edit', [PlanController::class, 'edit'])->name('edit');
Route::any('admin/plans/search', [PlanController::class, 'search'])->name('search');
Route::delete('admin/plans/{url}', [PlanController::class, 'destroy'])->name('destroy');
Route::post('admin/plans', [PlanController::class, 'store'])->name('store');
Route::get('admin/plans/create', [PlanController::class, 'create'])->name('create');
Route::get('admin/plans/{url}', [PlanController::class, 'show'])->name('show');
Route::get('admin/plans', [PlanController::class, 'index'])->name('index');

Route::get('admin', [PlanController::class, 'index'])->name('admin.home');

Route::get('/', function () {
    return view('welcome');
});
