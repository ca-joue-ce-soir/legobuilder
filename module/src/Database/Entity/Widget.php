<?php

namespace Legobuilder\Prestashop\Database\Entity;

use Doctrine\ORM\Mapping as ORM;
use Legobuilder\Framework\Database\Model\WidgetModelInterface;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Legobuilder\Prestashop\Database\Repository\WidgetRepository")
 */
final class Widget implements WidgetModelInterface
{
    /**
     * @var int
     * 
     * @ORM\Id
     * @ORM\Column(name="id_widget", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="zone", type="text")
     */
    private $zone;

    /**
     * @var array
     * 
     * @ORM\Column(name="control_settings", type="text")
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
    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get the value of controlSettings
     *
     * @return  array
     */ 
    public function getControlSettings(): array
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
    public function setControlSettings(array $controlSettings): self
    {
        $this->controlSettings = $controlSettings;

        return $this;
    }
}