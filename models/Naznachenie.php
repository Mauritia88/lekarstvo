<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "naznachenie".
 *
 * @property int $id_nazn
 * @property string|null $title
 *
 * @property NaznMed[] $naznMeds
 */
class Naznachenie extends \yii\db\ActiveRecord
{
    public $nazCount;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'naznachenie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 150],
            [['title'], 'unique'],
            [['title'], 'filter', 'filter' => 'trim'],
            [['title'], 'filter', 'filter' => function ($value) {
            return mb_strtolower($value, 'utf-8');
           }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_nazn' => 'ID',
            'title' => 'Назначение',
            'nazCount' => 'Количество лекарств',
        ];
    }

    /**
     * Gets query for [[NaznMeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNaznMeds1()
    {
        return $this->hasMany(Medicine::className(),['id_med' => 'id_med'])->viaTable('naznmed', ['id_nazn' => 'id_nazn']);
//        return $this->hasMany(NaznMed::class, ['id_nazn' => 'id_nazn']);
    }
}
