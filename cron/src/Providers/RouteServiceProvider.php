<?php

namespace Azuriom\Plugin\Cron\Providers;

use Azuriom\Extensions\Plugin\BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function loadRoutes()
    {
        Route::prefix($this->plugin->id)
            ->withoutMiddleware([
                \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
                \Azuriom\Http\Middleware\CheckForMaintenanceMode::class,
            ])
            ->name($this->plugin->id . '.')
            ->group(plugin_path($this->plugin->id . '/routes/web.php'));

        Route::prefix('admin/' . $this->plugin->id)
            ->middleware('admin-access')
            ->name($this->plugin->id . '.admin.')
            ->group(plugin_path($this->plugin->id . '/routes/admin.php'));
    }
}
