<?php

declare(strict_types=1);
namespace App\Helpers;

use Illuminate\Support\Facades\Cache;

class CacheHelper
{
    public static function getUserMessage()
    {
        $cacheKey = "userMessage";
        if (!Cache::has($cacheKey)) {
            return [];
        }

        return Cache::get($cacheKey);
    }
}
