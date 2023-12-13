<?php

namespace AlexisConception\Github\Dto;

use Spatie\LaravelData\Data;

class Status extends Data implements DataTransferObjectInterface
{
    public function __construct(
        public ?string $status
    ) {
    }

    public static function create(?array $data): self
    {
        return new self(
            status: $data['status'] ?? null
        );
    }
}
