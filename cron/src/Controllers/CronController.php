<?php

namespace Azuriom\Plugin\Cron\Controllers;

use Azuriom\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CronController extends Controller
{
    /**
     * Handle the cron execution request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request)
    {
        $key = setting('cron.key');

        if (empty($key)) {
            return response()->json(['error' => 'Cron key not configured.'], 500);
        }

        if ($request->input('key') !== $key) {
            return response()->json(['error' => 'Invalid key.'], 403);
        }

        try {
            // Exécuter schedule:run
            Artisan::call('schedule:run');
            $output = Artisan::output();

            \Azuriom\Models\Setting::updateSettings('cron.last_executed_at', now()->toIso8601String());

            return response()->json([
                'success' => true,
                'message' => 'Cron tasks executed successfully.',
                'output' => $output,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while executing cron tasks.',
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
}
