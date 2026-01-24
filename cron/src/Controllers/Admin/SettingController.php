<?php

namespace Azuriom\Plugin\Cron\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    /**
     * Show the cron settings page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = setting('cron.key');

        if (empty($key)) {
            $key = Str::random(32);
            Setting::updateSettings('cron.key', $key);
        }

        $url = route('cron.execute');

        return view('cron::admin.index', [
            'key' => $key,
            'url' => $url,
            'lastExecution' => setting('cron.last_executed_at'),
        ]);
    }

    /**
     * Regenerate the cron key.
     *
     * @return \Illuminate\Http\Response
     */
    public function regenerate()
    {
        $key = Str::random(32);
        Setting::updateSettings('cron.key', $key);

        return redirect()->route('cron.admin.index')
            ->with('success', trans('cron::messages.admin.key_regenerated'));
    }
}
