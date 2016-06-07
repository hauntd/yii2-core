<?php

namespace hauntd\core\validators;

use yii\validators\RegularExpressionValidator;
use Yii;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package hauntd\core\validators
 */
class UsernameValidator extends RegularExpressionValidator
{
    /** @var string */
    public $pattern = '/^[a-zA-Z0-9_-]+$/u';

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->message === null) {
            $this->message = Yii::t('validator', 'A username can consist of alphabetic characters, numbers, dashes and underscores.');
        }

        parent::init();
    }
}
