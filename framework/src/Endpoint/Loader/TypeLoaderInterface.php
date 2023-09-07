<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

interface TypeLoaderInterface
{
    public function get(string $typeName);

    public function register(string $typeClass): self;
}
