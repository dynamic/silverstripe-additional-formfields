<?php

namespace Dynamic\AdditionalFormFields\Form;

use SilverStripe\Forms\FormAction;
use SilverStripe\View\HTML;

/**
 * Class CancelFormAction
 * @package Dynamic\AdditionalFormFields\Form
 *
 * Action that takes the user back to a given link rather than submitting the form.
 */
class CancelFormAction extends FormAction
{
    /**
     * @var string
     */
    private $link;

    /**
     * CancelFormAction constructor.
     *
     * @param string $link
     * @param string $title
     * @param null $form
     */
    public function __construct($link = "", $title = "", $form = null)
    {
        if (!$title) {
            $title = _t('CancelFormAction.CANCEL', 'Cancel');
        }

        $this->setLink($link);

        parent::__construct(
            'CancelFormAction',
            $title,
            $form
        );
    }

    /**
     * @param $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param array $properties
     * @return string
     */
    public function Field($properties = array())
    {
        $attributes = array(
            'class' => 'cancel btn ' . ($this->extraClass() ? $this->extraClass() : ''),
            'id' => $this->id(),
            'name' => $this->action,
            'href' => $this->getLink()
        );

        if ($this->isReadonly()) {
            $attributes['disabled'] = 'disabled';
            $attributes['class'] = $attributes['class'] . ' disabled';
        }

        $content = $this->buttonContent ?
            $this->buttonContent :
            $this->Title();

        return HTML::createTag(
            'a',
            $attributes,
            $content
        );
    }
}
