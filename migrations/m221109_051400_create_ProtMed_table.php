<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ProtMed}}`.
 */
class m221109_051400_create_ProtMed_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ProtMed}}', [
            'id' => $this->primaryKey(),
            'id_prot'=> $this->integer()->notNull(),
            'id_med'=> $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'idx_6',
            'ProtMed',
            'id_prot'
        );
        $this->createIndex(
            'idx_7',
            'ProtMed',
            'id_med'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ProtMed}}');
    }
}
