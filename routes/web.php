<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Middleware\CheckRecordAccess;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/records/item/{id}', [RecordController::class, 'getItem'])->middleware(CheckRecordAccess::class);