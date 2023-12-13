<?php

namespace AlexisConception\Github\Dto;

use Spatie\LaravelData\Data;

class SecurityAndAnalysis extends Data implements DataTransferObjectInterface
{
    public function __construct(
        public Status $status
    ) {
    }

    public static function create(?array $data): self
    {
        return new self(
            status: Status::create($data['status'] ?? [])
        );
    }
}
