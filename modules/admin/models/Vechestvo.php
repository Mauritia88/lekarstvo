<?php

namespace app\modules\admin\models;

use app\models\Medicine;
use Yii;

/**
 * This is the model class for table "vechestvo".
 *
 * @property int $id_ves
 * @property string|null $title
 *
 * @property VechMed[] $vechMeds
 */
class Vechestvo extends \yii\db\ActiveRecord
{
    public $vCount;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vechestvo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ves' => 'ID',
            'title' => 'Вещество',
            'vCount'=>'Количество лекарств',
        ];
    }

    /**
     * Gets query for [[VechMeds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVechMeds1()
    {
//        return $this->hasMany(VechMed::class, ['id_v' => 'id_ves']);
        return $this->hasMany(Medicine::className(),['id_med' => 'id_med'])->viaTable('vechmed', ['id_v' => 'id_ves']);
    }
}
