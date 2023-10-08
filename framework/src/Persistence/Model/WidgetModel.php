<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Persistence\Model;

class WidgetModel
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $zoneId;

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

    public function getControlSettings(): array
    {
        return [];
    }

    /**
     * Get the value of zoneId
     *
     * @return  string
     */
    public function getZoneId()
    {
        return $this->zoneId;
    }

    /**
     * Set the value of zoneId
     *
     * @param  string  $zoneId
     *
     * @return  self
     */
    public function setZoneId(string $zoneId)
    {
        $this->zoneId = $zoneId;

        return $this;
    }
}
