<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Support\ServiceReturn;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $result = $this->authService->login($credentials);

        return $this->respond($result);
    }

    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,user'],
        ]);

        $result = $this->authService->register($data);

        return $this->respond($result);
    }

    private function respond(ServiceReturn $result): JsonResponse
    {
        return response()->json(
            data: $result->success ? ['message' => $result->message, ...$result->data] : ['message' => $result->message],
            status: $result->status
        );
    }
}
