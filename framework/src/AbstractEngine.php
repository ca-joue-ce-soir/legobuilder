<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Zone\ZoneInterface;
use Legobuilder\Framework\Renderer\DefaultRenderer;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Zone\ZoneCollectionInterface;

abstract class AbstractEngine implements EngineInterface
{
    /**
     * @var ZoneCollectionInterface
     */
    protected $zones;

    /**
     * @var RendererInterface
     */
    protected $renderer;

    /**
     * @var EndpointInterface
     */
    protected $endpoint;

    public function __construct()
    {
        $this->renderer = new DefaultRenderer();
    }

    public function registerZone(string $zoneIdentifier, ZoneInterface $zone): self
    {
        $this->zones->add($zoneIdentifier, get_class($zone));
        return $this;
    }

    public function getZones(): ZoneCollectionInterface
    {
        return $this->zones;
    }

    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }
}
