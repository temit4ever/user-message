<?php
declare(strict_types=1);

namespace App\Actions\UserMessage;

use App\Helpers\CacheHelper;

class ProcessDetailsAction
{
    public function handle()
    {
        return CacheHelper::getUserMessage();
    }

}
