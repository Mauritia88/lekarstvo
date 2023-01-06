<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%connection}}`.
 */
class m221109_053358_create_connection_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'con1','VechMed', 'id_med', 'medicine','id_med', 'CASCADE'
        );
        $this->addForeignKey(
            'con2','VechMed', 'id_v', 'vechestvo','id_ves', 'CASCADE'
        );
        $this->addForeignKey(
            'con3','ProtMed', 'id_prot', 'protivop','id_contr', 'CASCADE'
        );
        $this->addForeignKey(
            'con4','ProtMed', 'id_med', 'medicine','id_med', 'CASCADE'
        );
        $this->addForeignKey(
            'con5','NaznMed', 'id_nazn', 'naznachenie','id_nazn', 'CASCADE'
        );
        $this->addForeignKey(
            'con6','NaznMed', 'id_med', 'medicine','id_med', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //$this->dropTable('{{%connection}}'); // !!!!! не нашел таблицы connection, надо удалять ForeignKey как ниже
        $this->dropForeignKey('con2','VechMed');
    }
}
