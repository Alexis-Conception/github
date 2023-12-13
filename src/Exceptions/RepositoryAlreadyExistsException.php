<?php

namespace AlexisConception\Github\Exceptions;

class RepositoryAlreadyExistsException extends \Exception
{
    public function __construct(string $repositoryName)
    {
        parent::__construct("The repository {$repositoryName} already exists.");
    }
}
