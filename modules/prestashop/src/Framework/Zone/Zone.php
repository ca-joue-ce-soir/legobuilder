<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

class Zone
{
    /**
     * @var string
     */
    private $identifier;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * Get Zone Identifier
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }
}
