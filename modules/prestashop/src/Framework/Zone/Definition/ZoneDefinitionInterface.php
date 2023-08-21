<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Definition;

interface ZoneDefinitionInterface
{
    /**
     * Get Zone Identifier
     */
    public function getIdentifier();

    /**
     * Get the value of parameters
     *
     * @return  array
     */ 
    public function getParameters();
}
