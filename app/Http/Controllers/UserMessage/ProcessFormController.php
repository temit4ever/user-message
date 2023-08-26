<?php

declare(strict_types=1);
namespace App\Http\Controllers\UserMessage;

use App\Actions\UserMessage\ProcessFormAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserMessageRequest;

class ProcessFormController extends Controller
{
    public function __construct(protected ProcessFormAction $formAction)
    {
    }

    public function processUserMessageForm(UserMessageRequest $request): array
    {
        $this->formAction->handle($request);
        return [
            'result' => [
                'message' => 'Record created successfully',
                'statusCode' => 200,
            ],
        ];
    }
}
