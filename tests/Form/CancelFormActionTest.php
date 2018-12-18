<?php

namespace Dynamic\AdditionalFormFields\Test\Form;


use Dynamic\AdditionalFormFields\Form\CancelFormAction;
use SilverStripe\Dev\SapphireTest;

/**
 * Class CancelFormActionTest
 * @package Dynamic\AdditionalFormFields\Test\Form
 */
class CancelFormActionTest extends SapphireTest
{
    /**
     *
     */
    public function testGetLink()
    {
        $action = CancelFormAction::create('example.test', 'Cancel');
        $this->assertEquals('example.test', $action->getLink());
    }

    /**
     *
     */
    public function testSetLink()
    {
        $action = CancelFormAction::create('example.test', 'Cancel');
        $action->setLink('new-link.test');
        $this->assertEquals('new-link.test', $action->getLink());
    }

    public function testField()
    {
        $action = CancelFormAction::create('example.test', 'Cancel');
        $this->assertTrue(
            is_string($action->Field()),
            "Got a " . gettype($action->Field()) . " instead of a string"
        );

        $this->assertContains('href="example.test"', $action->Field());
        $this->assertNotContains('disabled', $action->Field());

        $action->setReadonly(true);
        $this->assertContains('disabled', $action->Field());
    }
}
