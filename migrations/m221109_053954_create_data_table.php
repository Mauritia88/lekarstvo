<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m221109_053954_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('medicine', [
            'id_med'=> 1,
            'name' => 'Флюколд',
            'manufacture'=> 'Наброс Фарма ПВТ. Лтд., Индия',
            'form'=> 'Таблетки',
            'instruct'=> '',
            'foto'=> '',
        ]);
        $this->insert('naznachenie', [
            'id_nazn' => 1,
            'title'=> 'ОРВИ',
        ]);
        $this->insert('naznachenie', [
            'id_nazn' => 2,
            'title'=> 'Грипп',
        ]);
        $this->insert('naznachenie', [
            'id_nazn' => 3,
            'title'=> 'Температура',
        ]);
        $this->insert('protivop', [
            'id_contr' => 1,
            'title'=> 'Повышенная чувствительность',
        ]);
        $this->insert('protivop', [
            'id_contr' => 2,
            'title'=> 'Эмфизема',
        ]);
        $this->insert('protivop', [
            'id_contr' => 3,
            'title'=> 'Острый инфаркт миокарда',
        ]);
        $this->insert('vechestvo', [
            'id_ves' => 1,
            'title'=> 'Paracetamol',
        ]);
        $this->insert('vechestvo', [
            'id_ves' => 2,
            'title'=> 'combinations excl. psycholeptics',
        ]);
        $this->insert('NaznMed', [
            'id_nazn' => 1,
            'id_med'=> 1,
        ]);
        $this->insert('NaznMed', [
            'id_nazn' => 2,
            'id_med'=> 1,
        ]);
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropTable('{{%data}}'); // !!!!! нет такой таблицы, правильней будет удалить данные для этой миграции, пример;
        $this->delete('NaznMed', [
            'id_nazn' => 2,
            'id_med'=> 1,
        ]);
    }
}
