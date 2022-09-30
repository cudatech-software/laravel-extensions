<?php

namespace CudaTech\LaravelExtensions;

use CudaTech\Contracts\Extensions\Extension;
use Illuminate\Support\Facades\Log;

class Extensions
{
    public array $extensions = [];

    public function addExtension(Extension $extension): self
    {
        $this->extensions[] = $extension;
        return $this;
    }

    public function getExtensions(): array
    {
        return $this->extensions;
    }

    public function invoke(string $event, ...$args): int
    {
        $success = true;

        /** @var Extension $extension */
        foreach ($this->extensions as $extension) {
            if ($extension->hasInvokable($event)) {
                try {
                    $extension->invoke($event, ...$args);
                } catch (\Exception $exception) {
                    $success = false;
                    Log::error($exception->getMessage(), $exception->getTrace());
                }
            }
        }

        return $success ? Extension::SUCCESS : Extension::FAILURE;
    }
}
