<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ProtMed".
 *
 * @property int $id
 * @property int $id_prot
 * @property int $id_med
 *
 * @property Medicine $med
 * @property Protivop $prot
 */
class ProtMed extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ProtMed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prot', 'id_med'], 'required'],
            [['id_prot', 'id_med'], 'integer'],
            [['id_prot'], 'exist', 'skipOnError' => true, 'targetClass' => Protivop::class, 'targetAttribute' => ['id_prot' => 'id_contr']],
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
            'id_prot' => 'Id Prot',
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
     * Gets query for [[Prot]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProt()
    {
        return $this->hasOne(Protivop::class, ['id_contr' => 'id_prot']);
    }
}
