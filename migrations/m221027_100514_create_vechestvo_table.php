<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vechestvo}}`.
 */
class m221027_100514_create_vechestvo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vechestvo}}', [
            'id_ves' => $this->primaryKey(),
            'title'=> $this->string(50)
        ]);

    

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vechestvo}}');
    }
}
