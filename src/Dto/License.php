<?php
namespace AlexisConception\Github\Dto;

use Spatie\LaravelData\Data;

class License extends Data implements DataTransferObjectInterface {
    public function __construct(
        public ?string $key,
        public ?string $name,
        public ?string $spdxId,
        public ?string $url,
        public ?string $nodeId,
    ) {}

    public static function create(?array $data): self {
        return new self(
            key: $data['key'] ?? null,
            name: $data['name'] ?? null,
            spdxId: $data['spdx_id'] ?? null,
            url: $data['url'] ?? null,
            nodeId: $data['node_id'] ?? null
        );
    }
}
