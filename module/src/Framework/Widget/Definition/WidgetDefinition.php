<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Control\ControlCollectionInterface;

class WidgetDefinition implements WidgetDefinitionInterface
{
    /**
     * @var string Unique definition identifier
     */
    private $id;

    /**
     * @var string Definition name
     */
    private $name;

    /**
    * @var string Template path
    */
    private $templatePath;

    /**
     * @var ControlCollectionInterface
     */
    private $controls;

    /**
     * Get unique definition identifier.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get definition name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

     /**
     * Get template path of Widget.
     *
     * @return string
     */
    public function getTemplatePath(): string
    {
        return $this->templatePath;
    }

    /**
     * Get definition columns.
     *
     * @return ControlCollectionInterface
     */
    public function getControls()
    {
        return $this->controls;
    }

    /**
     * Set the definition name.
     *
     * @param ControlCollectionInterface $controls
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the template path.
     *
     * @param string $templatePath
     * @return self
     */
    public function setTemplatePath(string $templatePath): self
    {
        $this->templatePath = $templatePath;

        return $this;
    }

    /**
     * Set the value of controls
     *
     * @param ControlCollectionInterface $controls
     * @return self
     */
    public function setControls(ControlCollectionInterface $controls)
    {
        $this->controls = $controls;

        return $this;
    }

    /**
     * Set unique definition identifier
     *
     * @param string $id Unique definition identifier
     * @return self
     */
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }
}
