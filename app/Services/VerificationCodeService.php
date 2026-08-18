<?php

namespace App\Services;

use App\Models\VerificationCode;
use Illuminate\Support\Facades\Hash;

class VerificationCodeService
{
    private const int TTL_MINUTES = 10;

    public function issue(string $email, ?array $payload = null): string
    {
        VerificationCode::where('email', $email)->delete();

        $code = (string) random_int(100000, 999999);

        VerificationCode::create([
            'email' => $email,
            'code' => Hash::make($code),
            'payload' => $payload,
            'expires_at' => now()->addMinutes(self::TTL_MINUTES),
        ]);

        return $code;
    }

    public function consume(string $email, string $code): ?VerificationCode
    {
        $record = VerificationCode::where('email', $email)
            ->where('expires_at', '>', now())
            ->latest('id')
            ->first();

        if (! $record || ! Hash::check($code, $record->code)) {
            return null;
        }

        $record->delete();

        return $record;
    }
}
