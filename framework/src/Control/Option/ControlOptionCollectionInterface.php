<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option;

use Iterator;

interface ControlOptionCollectionInterface extends Iterator 
{
    /**
     * Add a new Control Option to collection.
     * 
     * @param string $key
     * @param bool $required
     * @param mixed $default
     * @param callable $validator
     */
    public function add(string $key, bool $required = false, $default = null, ?callable $validator = null): self;
}