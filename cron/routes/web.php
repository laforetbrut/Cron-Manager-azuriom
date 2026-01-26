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
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::post('/execute', [CronController::class, 'handle'])->name('execute');
Route::post('/queue/execute', [CronController::class, 'handleQueue'])->name('queue.execute');
