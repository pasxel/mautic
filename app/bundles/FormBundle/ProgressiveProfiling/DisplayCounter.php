<?php

namespace Mautic\FormBundle\ProgressiveProfiling;

use Mautic\FormBundle\Entity\Field;
use Mautic\FormBundle\Entity\Form;

class DisplayCounter
{
    /**
     * @var int
     */
    private $displayedFields = 0;

    /**
     * @var int
     */
    private $alreadyAlwaysDisplayed = 0;

    /**
     * @var Form
     */
    private $form;

    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function increaseDisplayedFields()
    {
        ++$this->displayedFields;
    }

    /**
     * @return int
     */
    public function getDisplayFields()
    {
        return $this->displayedFields;
    }

    public function increaseAlreadyAlwaysDisplayed()
    {
        ++$this->alreadyAlwaysDisplayed;
    }

    /**
     * @return int
     */
    public function getAlreadyAlwaysDisplayed()
    {
        return $this->alreadyAlwaysDisplayed;
    }

    /**
     * @return int
     */
    public function getAlwaysDisplayFields()
    {
        $i= 0;
        /** @var Field $field */
        foreach ($this->form->getFields()->toArray() as $field) {
            if ($field->isAlwaysDisplay()) {
                ++$i;
            }
        }

        return $i;
    }
}
