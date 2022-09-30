<?php

use CudaTech\Contracts\Extensions\Extension;
use CudaTech\LaravelExtensions\Examples\BasicExtension;
use CudaTech\LaravelExtensions\Facades\Extensions;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;

it('can add extension', function () {
    $extension = new BasicExtension();
    Extensions::addExtension($extension);
    assertSame(
        Extensions::getExtensions(),
        [$extension]
    );
});

it('can invoke specific extension', function () {
    $extension = new BasicExtension();
    assertEquals(
        $extension->invoke('test', $text = time()),
        $text
    );
});

it('can invoke all extensions', function () {
    $extension1 = new BasicExtension();
    $extension2 = new BasicExtension();

    Extensions::addExtension($extension1);
    Extensions::addExtension($extension2);

    assertEquals(
        Extensions::invoke('test', time()),
        Extension::SUCCESS,
    );
});
