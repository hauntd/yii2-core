<?php

namespace hauntd\core\components;

use Yii;

/**
 * @author Alexander Kononenko <contact@hauntd.me>
 * @package hauntd\core\components
 */
class SqlDumpImport
{
    /**
     * @var array
     */
    public $sqlFiles = [];

    /**
     * @param array $sqlFiles
     */
    public function __construct($sqlFiles = [])
    {
        $this->sqlFiles = $sqlFiles;
    }

    /**
     * @throws \yii\db\Exception
     */
    public function importAll()
    {
        foreach ($this->sqlFiles as $file) {
            $this->importSqlFile($file);
        }
    }

    /**
     * @param $filePath
     * @throws \yii\db\Exception
     */
    public function importSqlFile($filePath)
    {
        $fp = fopen(Yii::getAlias($filePath), 'r');
        $query = '';
        while (($line = fgets($fp)) !== false) {
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            $query .= $line;
            if (substr(trim($line), -1, 1) == ';') {
                Yii::$app->db->createCommand($query)->execute();
                $query = '';
            }
        }
        fclose($fp);
    }
}
