<?php

namespace hauntd\core\migrations;

use Yii;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package hauntd\core\migrations
 */
class Migration extends \yii\db\Migration
{
    /**
     * @var string
     */
    protected $tableOptions;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (Yii::$app->db->driverName == 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
    }
}
