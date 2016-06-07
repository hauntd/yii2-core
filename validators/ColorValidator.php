<?php

namespace hauntd\core\validators;

use yii\validators\RegularExpressionValidator;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package hauntd\core\validators
 */
class ColorValidator extends RegularExpressionValidator
{
    /** @var string */
    public $pattern = '/^#[a-f0-9]{6}$/';
}
