<?php

use Azuriom\Plugin\Cron\Controllers\Admin\SettingController;
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

Route::get('/', [SettingController::class, 'index'])->name('index');
Route::post('/regenerate', [SettingController::class, 'regenerate'])->name('regenerate');
