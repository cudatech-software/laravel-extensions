<?php

namespace CudaTech\LaravelExtensions\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \CudaTech\LaravelExtensions\Extensions
 */
class Extensions extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \CudaTech\LaravelExtensions\Extensions::class;
    }
}
