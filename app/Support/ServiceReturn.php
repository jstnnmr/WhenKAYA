<?php

namespace App\Support;

class ServiceReturn
{
    public function __construct(
        public readonly bool $success,
        public readonly mixed $data = null,
        public readonly ?string $message = null,
        public readonly int $status = 200,
    ) {}

    public static function success(mixed $data = null, ?string $message = null, int $status = 200): self
    {
        return new self(success: true, data: $data, message: $message, status: $status);
    }

    public static function error(?string $message = null, int $status = 400, mixed $data = null): self
    {
        return new self(success: false, data: $data, message: $message, status: $status);
    }
}
