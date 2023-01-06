<?php

namespace app\models;

use app\models\Vechestvo;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VechestvoSearch represents the model behind the search form of `app\models\Vechestvo`.
 */
class VechestvoSearch extends Vechestvo
{
    public $vCount;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ves'], 'integer'],
            [['title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Vechestvo::find()
            ->select([
                "{{vechestvo}}.*",
                "COUNT({{vechmed}}.id_med) as vCount",
            ])
            ->groupBy('{{vechestvo}}.id_ves')
            ->joinWith('vechMeds1', 'id_v = id_ves');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 7,
            ],
            'sort' => [
                'defaultOrder' => [
                    'title' => SORT_ASC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_ves' => $this->id_ves,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
