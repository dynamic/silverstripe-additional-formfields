<?php

/**
 * Class StateDropdownFieldTest
 */
class StateDropdownFieldTest extends SapphireTest
{

    /**
     *
     */
    public function testField()
    {
        $field = StateDropdownField::create('State');
        $this->assertInstanceOf('HTMLText', $field->Field());
    }

}
