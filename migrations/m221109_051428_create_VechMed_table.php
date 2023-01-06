<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%VechMed}}`.
 */
class m221109_051428_create_VechMed_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%VechMed}}', [
            'id' => $this->primaryKey(),
            'id_v'=> $this->integer()->notNull(),
            'id_med'=> $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx_2',
            'VechMed',
            'id_v'
        );
        $this->createIndex(
            'idx_3',
            'VechMed',
            'id_med'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%VechMed}}');
    }
}
