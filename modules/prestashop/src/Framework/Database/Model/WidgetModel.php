<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Model;

final class WidgetModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $definitionId;

    /**
     * @var string
     */
    private $zone;

    /**
     * @var array
     */
    private $controlSettings;

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of definitionId
     *
     * @return  string
     */ 
    public function getDefinitionId()
    {
        return $this->definitionId;
    }

    /**
     * Set the value of definitionId
     *
     * @param  string  $definitionId
     *
     * @return  self
     */ 
    public function setDefinitionId(string $definitionId)
    {
        $this->definitionId = $definitionId;

        return $this;
    }

    /**
     * Get the value of zone
     *
     * @return  string
     */ 
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set the value of zone
     *
     * @param  string  $zone
     *
     * @return  self
     */ 
    public function setZone(string $zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get the value of controlSettings
     *
     * @return  array
     */ 
    public function getControlSettings()
    {
        return $this->controlSettings;
    }

    /**
     * Set the value of controlSettings
     *
     * @param  array  $controlSettings
     *
     * @return  self
     */ 
    public function setControlSettings(array $controlSettings)
    {
        $this->controlSettings = $controlSettings;

        return $this;
    }
}