<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'group', 'type'];

    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            
            if (!$setting) {
                return $default;
            }

            // Cast based on type
            return match($setting->type) {
                'boolean' => (bool) $setting->value,
                'number' => is_numeric($setting->value) ? (float) $setting->value : $default,
                'json' => json_decode($setting->value, true) ?? $default,
                default => $setting->value,
            };
        });
    }

    /**
     * Set a setting value.
     *
     * @param string $key
     * @param mixed $value
     * @param string|null $group
     * @return Setting
     */
    public static function set(string $key, mixed $value, ?string $group = null): Setting
    {
        // Convert value to string for storage
        if (is_bool($value)) {
            $value = $value ? '1' : '0';
        } elseif (is_array($value)) {
            $value = json_encode($value);
        }

        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group ?? 'general']
        );

        // Clear cache
        Cache::forget("setting.{$key}");
        Cache::forget('settings.all');

        return $setting;
    }

    /**
     * Get all settings grouped by their group.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function getAllGrouped()
    {
        return Cache::remember('settings.all', 3600, function () {
            return static::all()->groupBy('group');
        });
    }

    /**
     * Get all settings for a specific group.
     *
     * @param string $group
     * @return \Illuminate\Support\Collection
     */
    public static function getGroup(string $group)
    {
        return static::where('group', $group)->get();
    }

    /**
     * Clear all settings cache.
     */
    public static function clearCache(): void
    {
        $settings = static::all();
        foreach ($settings as $setting) {
            Cache::forget("setting.{$setting->key}");
        }
        Cache::forget('settings.all');
    }
}
