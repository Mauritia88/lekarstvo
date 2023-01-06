<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%protivop}}`.
 */
class m221027_100540_create_protivop_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%protivop}}', [
            'id_contr' => $this->primaryKey(),
            'title'=> $this->string(50)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%protivop}}');
    }
}
