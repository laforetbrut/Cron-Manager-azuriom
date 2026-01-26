<?php

namespace Azuriom\Plugin\Cron\Controllers;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
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

        $bearer = $request->bearerToken();

        if (!$bearer) {
            $bearer = $request->input('key');
        }

        if (!hash_equals((string) $key, (string) $bearer)) {
            return response()->json(['error' => 'Invalid key.'], 403);
        }

        try {
            Artisan::call('schedule:run');
            $output = Artisan::output();

            Setting::updateSettings('cron.last_executed_at', now()->toIso8601String());

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

    /**
     * Handle the queue execution request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleQueue(Request $request)
    {
        $key = setting('cron.key');

        if (empty($key)) {
            return response()->json(['error' => 'Cron key not configured.'], 500);
        }

        $bearer = $request->bearerToken();

        if (!$bearer) {
            $bearer = $request->input('key');
        }

        if (!hash_equals((string) $key, (string) $bearer)) {
            return response()->json(['error' => 'Invalid key.'], 403);
        }

        try {
            $output = shell_exec('php artisan queue:work --stop-when-empty');

            Setting::updateSettings('queue.last_executed_at', now()->toIso8601String());

            return response()->json([
                'success' => true,
                'message' => 'Queue processed successfully.',
                'output' => $output,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while processing queue.',
                'exception' => $e->getMessage(),
            ], 500);
        }
    }
}
