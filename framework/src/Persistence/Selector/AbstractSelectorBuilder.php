<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Persistence\Query;

abstract class AbstractSelectorBuilder
{
    abstract public function select(): self;

    abstract public function get(): mixed;
}
