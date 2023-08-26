<?php

declare(strict_types=1);
namespace App\Http\Controllers\UserMessage;

use App\Actions\UserMessage\ProcessDetailsAction;
use App\Http\Controllers\Controller;

class ProcessDetailsController extends Controller
{
    public function __construct(protected ProcessDetailsAction $detailsAction)
    {
    }

    public function processUserMessageDetails(): array
    {
        return $this->detailsAction->handle();

    }

}
