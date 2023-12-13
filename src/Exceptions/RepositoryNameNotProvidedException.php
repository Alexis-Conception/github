<?php

namespace AlexisConception\Github\Exceptions;

class RepositoryNameNotProvidedException extends \Exception
{
    public function __construct()
    {
        parent::__construct("The repository name was not provided.");
    }
}
