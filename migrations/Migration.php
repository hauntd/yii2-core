<?php

namespace hauntd\core\migrations;

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
     * @var string
     */
    protected $restrict = 'RESTRICT';
    /**
     * @var string
     */
    protected $cascade = 'CASCADE';
    /**
     * @var string
     */
    protected $dbType;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        parent::init();
        switch ($this->db->driverName) {
            case 'mysql':
                $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8mb4_bin ENGINE=InnoDB';
                $this->dbType = 'mysql';
                break;
            case 'pgsql':
                $this->tableOptions = null;
                $this->dbType = 'pgsql';
                break;
            case 'dblib':
            case 'mssql':
            case 'sqlsrv':
                $this->restrict = 'NO ACTION';
                $this->tableOptions = null;
                $this->dbType = 'sqlsrv';
                break;
            default:
                throw new \RuntimeException('Your database is not supported!');
        }
    }
}
