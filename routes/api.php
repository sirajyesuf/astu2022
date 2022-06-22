<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\EventController;

route::prefix('v1')
    ->middleware('client')
    ->group(function () {
        Route::get('/students', [StudentController::class, 'index']);
        Route::get('/events', [EventController::class, 'index']);
    });
