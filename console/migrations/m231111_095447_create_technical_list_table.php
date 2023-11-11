<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%technical_list}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m231111_095447_create_technical_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%technical_list}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'power' => $this->double(),
            'count' => $this->integer(),
            'time' => $this->integer(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-technical_list-category_id}}',
            '{{%technical_list}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-technical_list-category_id}}',
            '{{%technical_list}}',
            'category_id',
            '{{%category}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-technical_list-category_id}}',
            '{{%technical_list}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-technical_list-category_id}}',
            '{{%technical_list}}'
        );

        $this->dropTable('{{%technical_list}}');
    }
}
