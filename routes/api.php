<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\DeptGroupPhotoController;

route::prefix('v1')
    ->middleware('client')
    ->group(function () {
        Route::controller(StudentController::class)
            ->group(function () {
                Route::get('/students', 'index');
                Route::get('/students/{student}', 'show');
            });
        Route::get('/events', [EventController::class, 'index']);
        Route::get('/group_photos', [DeptGroupPhotoController::class, 'index']);
    });
