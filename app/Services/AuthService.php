<?php

namespace App\Services;

use App\Models\User;
use App\Support\ServiceReturn;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data): ServiceReturn
    {
        $user = User::create($data);

        return ServiceReturn::success(
            data: ['user' => $user, 'token' => $user->createToken('auth-token')->plainTextToken],
            message: 'Registration successful.',
            status: 201
        );
    }

    public function login(array $credentials): ServiceReturn
    {
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return ServiceReturn::error(message: 'Invalid credentials.', status: 401);
        }

        return ServiceReturn::success(
            data: ['user' => $user, 'token' => $user->createToken('auth-token')->plainTextToken],
            message: 'Login successful.'
        );
    }
}
