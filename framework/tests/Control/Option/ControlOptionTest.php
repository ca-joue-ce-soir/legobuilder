<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Tests\Control\Option;

use Legobuilder\Framework\Control\Option\ControlOptions;
use PHPUnit\Framework\TestCase;

class ControlOptionTest extends TestCase
{
    public function testUniqueOption()
    {
        $controlOptions = (new ControlOptions())
            ->setOption('label')
        ;
    }

    public function testMultipleOptions()
    {
        $controlOptions = (new ControlOptions())
            ->setOption('label')
            ->setOption('hint')
        ;
    }

    public function testOptionWithDefault()
    {
        $controlOptions = (new ControlOptions())
            ->setOption('label', 'Default value', 'is_text')
        ;
    }

    public function testOptionWithValidator()
    {
        $controlOptions = (new ControlOptions())
            ->setOption('label', 'Default value', 'is_text')
        ;
    }

    public function testOptionWithCustomValidator()
    {
        $controlOptions = (new ControlOptions())
            ->setOption('label', 'Default value', function($value): bool {
                return false;
            });
        ;
    }
}
