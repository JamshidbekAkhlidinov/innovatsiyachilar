<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%time_history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%technical_list}}`
 */
class m231112_054556_create_time_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%time_history}}', [
            'id' => $this->primaryKey(),
            'technical_id' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->datetime(),
        ]);

        // creates index for column `technical_id`
        $this->createIndex(
            '{{%idx-time_history-technical_id}}',
            '{{%time_history}}',
            'technical_id'
        );

        // add foreign key for table `{{%technical_list}}`
        $this->addForeignKey(
            '{{%fk-time_history-technical_id}}',
            '{{%time_history}}',
            'technical_id',
            '{{%technical_list}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%technical_list}}`
        $this->dropForeignKey(
            '{{%fk-time_history-technical_id}}',
            '{{%time_history}}'
        );

        // drops index for column `technical_id`
        $this->dropIndex(
            '{{%idx-time_history-technical_id}}',
            '{{%time_history}}'
        );

        $this->dropTable('{{%time_history}}');
    }
}
