<?php

namespace CudaTech\LaravelExtensions;

use Closure;

class Extension implements \CudaTech\Contracts\Extensions\Extension
{
    public array $invokables = [];

    /**
     * Get all invokable methods in this extension.
     *
     * @return array
     */
    public function getInvokables(): array
    {
        return $this->invokables;
    }

    /**
     * Set all invokable methods in this extension.
     *
     * @param  array  $invokables
     * @return \CudaTech\Contracts\Extensions\Extension
     */
    public function setInvokables(array $invokables): \CudaTech\Contracts\Extensions\Extension
    {
        $this->invokables = $invokables;
        return $this;
    }

    /**
     * Add new invokable methods to this extension.
     *
     * @param  string  $name
     * @param  array|Closure|string|callable  $invokable
     * @return \CudaTech\Contracts\Extensions\Extension
     */
    public function addInvokable(string $name, callable|array|string|Closure $invokable): \CudaTech\Contracts\Extensions\Extension
    {
        $this->invokables[$name] = $invokable;
        return $this;
    }

    /**
     * Check has invokable method exists in this extension.
     *
     * @param  string  $name
     * @return bool
     */
    public function hasInvokable(string $name): bool
    {
        return array_key_exists($name, $this->invokables);
    }

    /**
     * @param  string  $name
     * @param ...$args
     */
    public function invoke(string $name, ...$args)
    {
        return call_user_func(
            $this->invokables[$name],
            ...$args
        );
    }
}
