<?php

namespace AlexisConception\Github\Exceptions;

class RepositoryDoesNotExistException extends \Exception
{
    public function __construct(string $repositoryName)
    {
        parent::__construct("The repository {$repositoryName} does not exist.");
    }
}
