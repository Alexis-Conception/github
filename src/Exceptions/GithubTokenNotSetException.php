<?php

namespace AlexisConception\Github\Exceptions;

class GithubTokenNotSetException extends \Exception
{
    public function __construct()
    {
        parent::__construct('You must set a Github token to create a repository.');
    }
}
