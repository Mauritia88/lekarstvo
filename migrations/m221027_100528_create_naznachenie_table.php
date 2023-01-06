<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%naznachenie}}`.
 */
class m221027_100528_create_naznachenie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%naznachenie}}', [
            'id_nazn' => $this->primaryKey(),
            'title'=> $this->string(50)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%naznachenie}}');
    }
}
