<?php

namespace AlexisConception\Github\Dto;

use Spatie\LaravelData\Data;

class Permissions extends Data implements DataTransferObjectInterface
{
    public function __construct(
        public ?bool $admin,
        public ?bool $maintain,
        public ?bool $push,
        public ?bool $triage,
        public ?bool $pull
    ) {
    }

    public static function create(?array $data): self
    {
        return new self(
            admin: $data['admin'] ?? null,
            maintain: $data['maintain'] ?? null,
            push: $data['push'] ?? null,
            triage: $data['triage'] ?? null,
            pull: $data['pull'] ?? null
        );
    }
}
