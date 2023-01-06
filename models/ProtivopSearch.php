<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Protivop;

/**
 * ProtivopSearch represents the model behind the search form of `app\models\Protivop`.
 */
class ProtivopSearch extends Protivop
{
    public $protCount;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_contr'], 'integer'],
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
        $query = Protivop::find()
        ->select([
            "{{protivop}}.*",
            "COUNT({{protmed}}.id_med) as protCount",
        ])
            ->JoinWith("protMeds1", 'id_prot = id_contr')
            ->groupBy("{{protivop}}.id_contr");

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
            'id_contr' => $this->id_contr,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
