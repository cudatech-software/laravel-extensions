<?php

namespace CudaTech\LaravelExtensions\Examples;

use CudaTech\LaravelExtensions\Extension;

class BasicExtension extends Extension
{
    public function __construct()
    {
        $this->invokables = [
            'test' => [$this, 'test'],
            'test2' => function () {
                return 'hello world';
            },
        ];
    }

    public function test(string $text): string
    {
        return $text;
    }
}
