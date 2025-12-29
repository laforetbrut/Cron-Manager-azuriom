<?php

use Azuriom\Plugin\Cron\Controllers\CronController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin's
| URL prefix (e.g. "/cron").
|
*/

Route::get('/execute', [CronController::class, 'handle'])->name('execute');
