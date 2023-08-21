<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Definition;

class ZoneDefinition implements ZoneDefinitionInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var array
     */
    private $parameters;

    public function __construct(string $identifier, array $parameters = [])
    {
        $this->identifier = $identifier;
        $this->parameters = $parameters;
    }

    /**
     * Get Zone Identifier
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * Get the value of parameters
     *
     * @return  array
     */ 
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set the value of parameters
     *
     * @param  array  $parameters
     *
     * @return  self
     */ 
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }
}
