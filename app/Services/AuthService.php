<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\VerificationCodeNotification;
use App\Support\ServiceReturn;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AuthService
{
    public function __construct(private readonly VerificationCodeService $verificationCodeService)
    {
    }

    public function requestRegistration(array $data): ServiceReturn
    {
        $payload = $data;
        unset($payload['password_confirmation']);
        $payload['password'] = Hash::make($payload['password']);

        $code = $this->verificationCodeService->issue(email: $data['email'], payload: $payload);

        Notification::route('mail', $data['email'])->notify(
            new VerificationCodeNotification(
                code: $code,
                subject: 'Verify Your Email Address',
                intro: 'You are receiving this email because you registered an account with WHENKAYA.',
            )
        );

        return ServiceReturn::success(message: 'Verification code sent to your email address.', status: 201);
    }

    public function verifyRegistration(array $data): ServiceReturn
    {
        $record = $this->verificationCodeService->consume(email: $data['email'], code: $data['code']);

        if (! $record) {
            return ServiceReturn::error(message: 'Invalid or expired verification code.', status: 400);
        }

        $user = User::create($record->payload);

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
