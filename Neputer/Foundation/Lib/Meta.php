<?php

namespace Foundation\Lib;

use ArrayAccess;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class Meta
 * @package Foundation\Lib
 */
final class Meta
{

    /**
     * Return value for given dotted key
     *
     * if key : notifier.email than notifier will be the key for settings table column or config name
     * And after that dotted will be the key for json encoded data
     *
     * @param $key
     * @return array|ArrayAccess|mixed
     */
    public static function args($key)
    {
        $first = null;
        if (Str::contains($key, '.')) {
            $args = explode('.', $key);
            $first = head($args);
        }

        $meta = Meta::get($first);

        if (isset($meta)) {
            $arrs = is_json($meta) ? json_decode($meta, 1) : $meta;
        } else {
            $arrs = config($first);
        }
        return Arr::get($arrs, str_replace($first.'.', '', $key));
    }

    public static function social($key = 'social')
    {
        return Meta::value($key);
    }

    public static function deliveryOptions($key = 'delivery_options', $slug = null)
    {
        return Arr::get(Meta::value($key), $slug);
    }

    public static function value($key)
    {
        $meta = Meta::get($key);
        return is_json($meta) ? json_decode($meta, 1) : $meta;
    }

    public static function get($key, $default = null)
    {
        return \Cache::remember(self::resolveCacheKey($key), Cache::TIME_INTERVAL, function () use ($key, $default) {
            return app('db')
                    ->table('site_setting')
                    ->where('key', $key)
                    ->value('value') ?? $default;
        });
    }

    public static function set($key, $value)
    {
        $isArr = is_array($value);

        app('db')
            ->table('settings')
            ->updateOrInsert(
                ['key' => $key,],
                ['value' => $isArr ? Utility::jsonEncode($value) : $value,]
            );

        Cache::clear();
    }

    public static function first($key)
    {
        return \Cache::remember(self::resolveCacheKey($key), Cache::TIME_INTERVAL, function () use ($key) {
            return Setting::query()
                ->where('key', $key)
                ->first();
        });
    }

    /**
     * Resolve the cache key
     *
     * @param string $key
     * @return string
     */
    private static function resolveCacheKey(string $key)
    {
        return 'settings-'.$key;
    }

}
