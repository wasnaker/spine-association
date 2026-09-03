<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Association\Http\Controllers\AssociationController;

/*
|--------------------------------------------------------------------------
| ROUTE MODUL Association (konvensi core: api/v1 + auth:sanctum)
|--------------------------------------------------------------------------
| Middleware permission:feature:capability (gate per aksi).
|
|   /api/v1/associations
|     GET    /                              association:view
|     POST   /                              association:create
|     GET    /{id}                          association:view
|     PUT    /{id}                          association:edit
|     DELETE /{id}                          association:delete
|     GET    /{id}/activity-logs            association:view
*/

Route::prefix('api/v1')->middleware('auth:sanctum')->group(function () {
    Route::prefix('associations')->group(function () {
        Route::get('/', [AssociationController::class, 'index'])->middleware('permission:association:view');
        Route::post('/', [AssociationController::class, 'store'])->middleware('permission:association:create');
        Route::get('/{id}', [AssociationController::class, 'show'])->whereNumber('id')->middleware('permission:association:view');
        Route::put('/{id}', [AssociationController::class, 'update'])->whereNumber('id')->middleware('permission:association:edit');
        Route::get('/{id}/activity-logs', [AssociationController::class, 'activityLogs'])->whereNumber('id')->middleware('permission:association:view');
        Route::delete('/{id}', [AssociationController::class, 'destroy'])->whereNumber('id')->middleware('permission:association:delete');
    });
});
