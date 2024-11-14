<?php

namespace App\Services;

use App\Models\Setting;
use Cache;

class SettingsService {

    /**
     * Get all settings as a key-value array.
     *
     * @return array<string, string>
     */
    public function getSettings(){
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray(); // ['key' => 'value']
        });
    }

    /**
     * Set the global settings configuration.
     *
     * @return void
     */
    function setGlobalSettings(): void {
        $settings = $this->getSettings();
        config()->set('settings', $settings); // not stored at separate file but in memory
    }

    /**
     * Clear the cached settings.
     *
     * @return void
     */
    public function clearCachedSettings(): void
    {
        Cache::forget('settings');
    }

}