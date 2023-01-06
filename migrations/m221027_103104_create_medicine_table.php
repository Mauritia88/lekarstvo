<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%medicine}}`.
 */
class m221027_103104_create_medicine_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%medicine}}', [
            'id_med' => $this->primaryKey(),
            'name'=> $this->string(50),
            'manufacture'=> $this->string(50),
            'form'=> $this->string(50),
            'instruct'=> $this->string(50),
            'foto'=> $this->string(50),
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%medicine}}');
    }
}
