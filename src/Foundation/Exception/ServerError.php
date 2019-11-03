<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Foundation\Exception;

class ServerError extends Exception
{
    public static function withMessage(string $message, int $code) : self
    {
        return new self($message, $code);
    }
}
