<?php

declare(strict_types=1);
namespace App\Actions\UserMessage;

use App\Helpers\CacheHelper;
use App\Http\Requests\UserMessageRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class ProcessFormAction
{

    public function handle(UserMessageRequest $request): array
    {
        $data = $request->validated();
        $cacheKey = "userMessage";
        if (Cache::has($cacheKey)) {
            $dataArray = CacheHelper::getUserMessage();
            $dataArray['result'][] = $data;
            Cache::put($cacheKey,  $dataArray, Carbon::now()->addMinute(60));
            return CacheHelper::getUserMessage();
        }

        Cache::put('userMessage', ['result' => [$data]], Carbon::now()->addMinute(60));

        return CacheHelper::getUserMessage();
    }
}
