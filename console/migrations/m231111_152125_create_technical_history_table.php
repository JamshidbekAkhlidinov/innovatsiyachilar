<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%technical_history}}`.
 */
class m231111_152125_create_technical_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%technical_history}}', [
            'id' => $this->primaryKey(),
            'technical_id' => $this->integer(),
            'date' => $this->date(),
            'calculate_time' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%technical_history}}');
    }
}
