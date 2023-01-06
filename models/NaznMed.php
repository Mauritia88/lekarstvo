<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NaznMed".
 *
 * @property int $id
 * @property int $id_nazn
 * @property int $id_med
 *
 * @property Medicine $med
 * @property Naznachenie $nazn
 */
class NaznMed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'NaznMed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nazn', 'id_med'], 'required'],
            [['id_nazn', 'id_med'], 'integer'],
            [['id_nazn'], 'exist', 'skipOnError' => true, 'targetClass' => Naznachenie::class, 'targetAttribute' => ['id_nazn' => 'id_nazn']],
            [['id_med'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::class, 'targetAttribute' => ['id_med' => 'id_med']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_nazn' => 'Id Nazn',
            'id_med' => 'Id Med',
        ];
    }

    /**
     * Gets query for [[Med]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMed()
    {
        return $this->hasOne(Medicine::class, ['id_med' => 'id_med']);
    }

    /**
     * Gets query for [[Nazn]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNazn()
    {
        return $this->hasOne(Naznachenie::class, ['id_nazn' => 'id_nazn']);
    }
}
