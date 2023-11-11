<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%technical_list}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m231111_151633_add_created_by_column_to_technical_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%technical_list}}', 'created_by', $this->integer());

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-technical_list-created_by}}',
            '{{%technical_list}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-technical_list-created_by}}',
            '{{%technical_list}}',
            'created_by',
            '{{%user}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-technical_list-created_by}}',
            '{{%technical_list}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-technical_list-created_by}}',
            '{{%technical_list}}'
        );

        $this->dropColumn('{{%technical_list}}', 'created_by');
    }
}
