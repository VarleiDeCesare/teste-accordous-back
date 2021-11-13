<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\PropertiesController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'properties' => PropertiesController::class,
    'contracts' => ContractController::class,
]);

