<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Naznachenie;

/**
 * NaznachenieSearch represents the model behind the search form of `app\models\Naznachenie`.
 */
class NaznachenieSearch extends Naznachenie
{
    public $nazCount;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nazn'], 'integer'],
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
        $query = Naznachenie::find()
            ->select([
                "{{naznachenie}}.*",
                "COUNT({{naznmed}}.id_med) AS nazCount",
            ])
            ->JoinWith('naznMeds1', 'id_nazn = id_nazn')
            ->groupBy("{{naznachenie}}.id_nazn");

//        SELECT naznachenie.*, COUNT(NaznMed.id_med) as nazCount FROM naznachenie
// LEFT JOIN NaznMed on NaznMed.id_nazn = naznachenie.id_nazn GROUP BY naznachenie.id_nazn;


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
            'id_nazn' => $this->id_nazn,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
