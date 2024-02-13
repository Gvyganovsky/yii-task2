<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Applications;

/**
 * ApplicationsSearch represents the model behind the search form of `app\models\Applications`.
 */
class ApplicationsSearch extends Applications
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_application', 'user_id'], 'integer'],
            [['carNumber', 'description', 'Status'], 'safe'],
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
        $query = Applications::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_application' => $this->id_application,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'carNumber', $this->carNumber])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'Status', $this->Status]);

        return $dataProvider;
    }
}
