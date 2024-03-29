<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Entity;

class WidgetRevision
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $type;

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
     * @return int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of type
     *
     * @return string
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     *
     * @return self
     */ 
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of zone
     *
     * @return string
     */ 
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set the value of zone
     *
     * @param string $zone
     *
     * @return self
     */ 
    public function setZone(string $zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get the value of controlSettings
     *
     * @return array
     */ 
    public function getControlSettings()
    {
        return $this->controlSettings;
    }

    /**
     * Set the value of controlSettings
     *
     * @param array $controlSettings
     *
     * @return self
     */ 
    public function setControlSettings(array $controlSettings)
    {
        $this->controlSettings = $controlSettings;

        return $this;
    }
}
