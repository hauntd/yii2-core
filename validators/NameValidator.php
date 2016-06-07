<?php

namespace hauntd\core\validators;

use yii\validators\RegularExpressionValidator;
use Yii;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package hauntd\core\validators
 */
class NameValidator extends RegularExpressionValidator
{
    /** @var string */
    public $pattern = '/^[a-zA-ZÀ-ÖØ-öø-ÿ]+(([.\'ªº]{1}[\s]?|[\s\-]{1})[a-zA-ZÀ-ÖØ-öø-ÿ]+)*[.ªº]?$/u';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->message === null) {
            $this->message = Yii::t('validator', "A name can consist of Latin alphabetic characters. It can contain points, apostrophes ['] and ordinals [ºª] as terminators of words, and blank spaces [ ] or dashes [-] as separator characters. A name can not contain more than one successive separator character.");
        }

        parent::init();
    }
}
