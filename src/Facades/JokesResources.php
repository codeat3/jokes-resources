<?php

namespace Codeat3\JokesResources\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Codeat3\JokesResources\JokesResources
 */
class JokesResources extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Codeat3\JokesResources\JokesResources::class;
    }
}
