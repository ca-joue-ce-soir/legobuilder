<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;

class ControlResolver
{
    /**
     * @var ControlRegistryInterface 
     */
    private $controlRegistry;

    public function __construct(ControlRegistryInterface $controlRegistry)
    {
        $this->controlRegistry = $controlRegistry;
    }

    /**
     * Retrieve all the controls saved for the current engine and 
     * formats them correctly to match the GraphQL type.
     * 
     * @return array Registered controls
     */
    public function getRegisteredControls(): array
    {
        $registeredControls = $this->controlRegistry->getRegisteredControls();
        $registeredControlsFormatted = [];

        foreach ($registeredControls as $control) {
            $registeredControlsFormatted[] =  [
                'type' => $control->getType(),
                'options' => 'a'
            ];
        }

        return $registeredControlsFormatted;
    }
}
