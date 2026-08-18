<?php

namespace App\Http\Controllers;

use App\Support\ServiceReturn;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function respond(ServiceReturn $result): JsonResponse
    {
        return response()->json(
            data: $result->success ? ['message' => $result->message, ...($result->data ?? [])] : ['message' => $result->message],
            status: $result->status
        );
    }
}
