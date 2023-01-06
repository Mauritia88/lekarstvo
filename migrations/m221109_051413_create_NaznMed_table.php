<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%NaznMed}}`.
 */
class m221109_051413_create_NaznMed_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%NaznMed}}', [
            'id' => $this->primaryKey(),
            'id_nazn'=> $this->integer()->notNull(),
            'id_med'=> $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx_4',
            'NaznMed',
            'id_nazn'
        );
        $this->createIndex(
            'idx_5',
            'NaznMed',
            'id_med'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%NaznMed}}');
    }
}
