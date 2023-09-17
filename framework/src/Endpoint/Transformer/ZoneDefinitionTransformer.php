<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Transformer;

use Legobuilder\Framework\Zone\Definition\ZoneDefinitionInterface;

final class ZoneDefinitionTransformer implements TypeTransformerInterface
{
    /**
     * @param ZoneDefinitionInterface $zoneDefinition
     * @return array Zone definitions
     */
    public function transform(mixed $zoneDefinition)
    {
        return [
            'id' => $zoneDefinition->getIdentifier(),
            'parameters' => array_keys($zoneDefinition->getParameters())
        ];
    }
}