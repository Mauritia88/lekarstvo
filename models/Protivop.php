<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "protivop".
 *
 * @property int $id_contr
 * @property string|null $title
 *
 * @property ProtMed[] $protMeds
 */
class Protivop extends \yii\db\ActiveRecord
{
    public $protCount;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'protivop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'unique'],
            [['title'], 'string', 'max' => 50],
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
            'id_contr' => 'ID',
            'title' => 'Противопоказания',
            'protCount'=>'Количество лекарств',
        ];
    }

    /**
     * Gets query for [[ProtMeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProtMeds1()
    {
//        return $this->hasMany(ProtMed::class, ['id_prot' => 'id_contr']);
        return $this->hasMany(Medicine::className(),['id_med' => 'id_med'])->viaTable('protmed', ['id_prot' => 'id_contr']);
    }
}
