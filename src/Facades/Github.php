<?php

namespace AlexisConception\Github\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AlexisConception\Github\Github
 */
class Github extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \AlexisConception\Github\Github::class;
    }
}
