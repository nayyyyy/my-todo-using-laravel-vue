<?php
declare(strict_types=1);

namespace App\Trait;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function sendSuccess(mixed $data, string $message, int $code = 200): JsonResponse
    {
        return new JsonResponse([
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function sendNoContent(string $message, int $code = 200): JsonResponse
    {
        return new JsonResponse([
            'message' => $message
        ], $code);
    }
}
