<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "VechMed".
 *
 * @property int $id
 * @property int $id_v
 * @property int $id_med
 *
 * @property Medicine $med
 * @property Vechestvo $v
 */
class VechMed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'VechMed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_v', 'id_med'], 'required'],
            [['id_v', 'id_med'], 'integer'],
            [['id_med'], 'exist', 'skipOnError' => true, 'targetClass' => Medicine::class, 'targetAttribute' => ['id_med' => 'id_med']],
            [['id_v'], 'exist', 'skipOnError' => true, 'targetClass' => Vechestvo::class, 'targetAttribute' => ['id_v' => 'id_ves']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_v' => 'Id V',
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
     * Gets query for [[V]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getV()
    {
        return $this->hasOne(Vechestvo::class, ['id_ves' => 'id_v']);
    }
}
