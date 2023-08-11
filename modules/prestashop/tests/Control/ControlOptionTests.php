<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Tests\Control;

use Legobuilder\Framework\Control\Option\ControlOptions;
use PHPUnit\Framework\TestCase;

class ControlOptionTests extends TestCase
{
    public function testUniqueOption()
    {
        $controlOptions = (new ControlOptions())
            ->addOption('label')
        ;

        $this->assertNotNull($controlOptions->getOption('label'));
    }

    public function testMultipleOptions()
    {
        $controlOptions = (new ControlOptions())
            ->addOption('label')
            ->addOption('hint')
        ;
        
        $this->assertNotNull($controlOptions->getOption('label'));
        $this->assertNotNull($controlOptions->getOption('hint'));
    }

    public function testOptionWithDefault()
    {
        $controlOptions = (new ControlOptions())
            ->addOption('label', false, 'Lorem ipsum')
        ;

        $this->assertNotNull($controlOptions->getOption('label'));
        $this->assertSame($controlOptions->getOption('label')->getDefault(), 'Lorem ipsum');
    }

    public function testOptionWithValidator()
    {
        $controlOptions = (new ControlOptions())
            ->addOption('label', false, 'Lorem ipsum', 'is_string')
        ;

        $this->assertNotNull($controlOptions->getOption('label'));
        $this->assertSame($controlOptions->getOption('label')->getValidator(), 'is_string');
    }

    public function testOptionWithCustomValidator()
    {
        $controlOptions = (new ControlOptions())
            ->addOption('label', false, 'Lorem ipsum', function($value): bool {
                return false;
            });
        ;

        $this->assertNotNull($controlOptions->getOption('label'));
        $this->assertFalse(call_user_func($controlOptions->getOption('label')->getValidator(), 'value'));
    }
}
