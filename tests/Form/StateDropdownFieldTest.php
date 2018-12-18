<?php

namespace Dynamic\AdditionalFormFields\Test\Form;

use Dynamic\AdditionalFormFields\Form\StateDropdownField;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\FieldType\DBHTMLText;

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
        $this->assertInstanceOf(DBHTMLText::class, $field->Field());
    }
}
