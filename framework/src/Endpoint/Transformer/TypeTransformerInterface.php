<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Transformer;

interface TypeTransformerInterface
{
    public function transform(mixed $value);
}