<?php

namespace AlexisConception\Github\Dto;

interface DataTransferObjectInterface
{
    public static function create(?array $data): self;
}
