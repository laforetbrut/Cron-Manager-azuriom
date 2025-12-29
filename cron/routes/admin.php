<?php

use Azuriom\Plugin\Cron\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "admin" middleware group and your plugin's
| admin URL prefix (e.g. "/admin/cron").
|
*/

Route::get('/', [SettingController::class, 'index'])->name('index');
Route::post('/regenerate', [SettingController::class, 'regenerate'])->name('regenerate');
