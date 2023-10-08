<?php

declare(strict_types=1);

use Legobuilder\Framework\Engine\Control\ControlCollection;
use Legobuilder\Framework\Engine\Control\ControlCollectionInterface;
use Legobuilder\Framework\Engine\Control\ControlInterface;
use Legobuilder\Framework\Engine\Control\Exception\ControlNotFoundException;
use PHPUnit\Framework\TestCase;

class ControlCollectionTest extends TestCase
{
    /**
     * @var ControlCollectionInterface
     */
    private $controlCollection;

    protected function setUp(): void
    {
        $this->controlCollection = new ControlCollection();
    }

    /**
     * Test the functionality of adding controls to a collection.
     */
    public function testAddControlToCollection()
    {
        $controlExampleOne = $this->createMock(ControlInterface::class);
        $controlExampleOne->method('getId')->willReturn('example_one');

        $controlExampleTwo = $this->createMock(ControlInterface::class);
        $controlExampleTwo->method('getId')->willReturn('example_two');

        $controlExampleThree = $this->createMock(ControlInterface::class);
        $controlExampleThree->method('getId')->willReturn('example_three');
        
        $this->controlCollection
            ->add($controlExampleOne)
            ->add($controlExampleTwo)
            ->add($controlExampleThree)
        ;

        $controlOptions = $this->controlCollection->getControls();

        $this->assertContains($controlExampleOne, $controlOptions);
        $this->assertContains($controlExampleTwo, $controlOptions);
        $this->assertContains($controlExampleThree, $controlOptions);
    }

    /**
     * Test the functionality of adding a control before another control in the collection.
     */
    public function testAddBeforeControlToCollection()
    {
        $controlExampleOne = $this->createMock(ControlInterface::class);
        $controlExampleOne->method('getId')->willReturn('example_one');

        $this->controlCollection->add($controlExampleOne);

        $controlExampleTwo = $this->createMock(ControlInterface::class);
        $controlExampleTwo->method('getId')->willReturn('example_two');

        $controlExampleThree = $this->createMock(ControlInterface::class);
        $controlExampleThree->method('getId')->willReturn('example_three');

        $this->controlCollection
            ->addBefore('example_one', $controlExampleTwo)
            ->addBefore('example_two', $controlExampleThree)
        ;

        $controlOptions = $this->controlCollection->getControls();
        $controlOptionsOrderedById = array_keys($controlOptions);

        $this->assertEquals(['example_three', 'example_two', 'example_one'], $controlOptionsOrderedById);
    }

    /**
     * Test the removal of a control from the collection.
     *
     * @depends testAddControlToCollection
     */
    public function testRemoveControlFromCollection()
    {
        $controlId = 'control_example';

        $controlExample = $this->createMock(ControlInterface::class);
        $controlExample->method('getId')->willReturn($controlId);

        $this->controlCollection->add($controlExample);
        $this->controlCollection->remove($controlId);

        $this->assertNotContains($controlExample, $this->controlCollection->getControls());
    }
    
    /**
     * Test the removal a non-existent control from the collectiony.
     */
    public function testRemoveNonExistentControlFromCollection()
    {
        $this->controlCollection->remove('non_existant_control');
        $this->assertEmpty($this->controlCollection->getControls());
    }

    /**
     * Test adding a control before a non-existent control.
     */
    public function testAddControlBeforeNonExistentControl()
    {
        $controlExample = $this->createMock(ControlInterface::class);

        $this->expectException(ControlNotFoundException::class);
        $this->controlCollection->addBefore('non_existant_control', $controlExample);

        $this->assertEmpty($this->controlCollection->getControls());
    }
    
    /**
     * Test adding a control after a non-existent control.
     */
    public function testAddControlAfterNonExistentControl()
    {
        $controlExample = $this->createMock(ControlInterface::class);

        $this->expectException(ControlNotFoundException::class);
        $this->controlCollection->addBefore('non_existant_control', $controlExample);

        $this->assertEmpty($this->controlCollection->getControls());
    }
}
