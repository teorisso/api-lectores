<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectorController;


Route::apiResource('lectores', LectorController::class);

