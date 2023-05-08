<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control;

use Legobuilder\Framework\Control\Option\ControlOptions;

abstract class AbstractControl implements ControlInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * Get unique control id.
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get translated control name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getOptions(): ControlOptions
    {
        return (new ControlOptions())
            ->setOption('label', null, 'is_text')
            ->setOption('hint', null, 'is_text')
        ;
    }
}
