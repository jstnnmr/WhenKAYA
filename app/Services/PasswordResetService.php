<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\VerificationCodeNotification;
use App\Support\ServiceReturn;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Notification;

class PasswordResetService
{
    public function __construct(private readonly VerificationCodeService $verificationCodeService)
    {
    }

    public function sendResetLink(string $email): ServiceReturn
    {
        $user = User::where('email', $email)->first();

        if (! $user) {
            return ServiceReturn::error(message: 'We could not find a user with that email address.', status: 404);
        }

        $code = $this->verificationCodeService->issue(email: $email);

        Notification::route('mail', $email)->notify(
            new VerificationCodeNotification(
                code: $code,
                subject: 'Reset Your Password',
                intro: 'You are receiving this email because we received a password reset request for your account.',
            )
        );

        return ServiceReturn::success(message: 'Password reset code sent to your email address.');
    }

    public function reset(array $data): ServiceReturn
    {
        $user = User::where('email', $data['email'])->first();

        if (! $user) {
            return ServiceReturn::error(message: 'We could not find a user with that email address.', status: 404);
        }

        $record = $this->verificationCodeService->consume(email: $data['email'], code: $data['code']);

        if (! $record) {
            return ServiceReturn::error(message: 'The verification code is invalid or has expired.', status: 400);
        }

        $user->password = $data['password'];
        $user->save();

        event(new PasswordReset($user));

        return ServiceReturn::success(message: 'Password has been reset successfully.');
    }
}
