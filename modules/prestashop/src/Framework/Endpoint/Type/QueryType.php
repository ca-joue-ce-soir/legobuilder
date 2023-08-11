<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\EngineInterface;
use Legobuilder\Framework\Zone\Zone;

final class QueryType extends ObjectType
{
    public function __construct(EngineInterface $engine)
    {
        parent::__construct([
            'name' => 'Query',
            'fields' => [
                'zones' => [
                    'type' => Type::listOf(ZoneType::type()),
                    'description' => 'Get all the zones registered in the engine',
                    'resolve' => function() use($engine): array {

                        $registeredZones = $engine->getZoneRegistry()->getRegisteredZones();

                        return array_map(function(Zone $zone) {
                            return [
                                'id' => $zone->getIdentifier()
                            ];
                        }, $registeredZones);
                    }
                ],
                'widgets' => [
                    'type' => Type::listOf(WidgetType::type()),
                    'description' => '',
                    'resolve' => function() use ($engine): array {
                        return [];
                    }
                ],
                'controls' =>  [
                    'type' => Type::listOf(ControlType::type()),
                    'description' => '',
                    'resolve' => function() use ($engine): array {

                        $registeredControls = $engine->getControlRegistry()->getRegisteredControls();
                        $registeredControlsFormatted = [];

                        foreach ($registeredControls as $registeredControl) {
                            $registeredControlsFormatted[] = [
                                'type' => $registeredControl->getType(),
                                'options' => 'a'
                            ];
                        }

                        return $registeredControlsFormatted;
                    }
                ]
            ]
        ]);
    }
}
