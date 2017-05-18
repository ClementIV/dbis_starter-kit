<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Project;

/**
 * ProjectSearch represents the model behind the search form about `common\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'teacherid', 'status'], 'integer'],
            [['name', 'startdate', 'enddate', 'source', 'introduction', 'project_num', 'finance_account', 'paper', 'patent', 'software', 'displayurl'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Project::find();

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
            'id' => $this->id,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'teacherid' => $this->teacherid,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'introduction', $this->introduction])
            ->andFilterWhere(['like', 'project_num', $this->project_num])
            ->andFilterWhere(['like', 'finance_account', $this->finance_account])
            ->andFilterWhere(['like', 'paper', $this->paper])
            ->andFilterWhere(['like', 'patent', $this->patent])
            ->andFilterWhere(['like', 'software', $this->software])
            ->andFilterWhere(['like', 'displayurl', $this->displayurl]);

        return $dataProvider;
    }

    public function searchwithTag($tagid)
    {
        $query = Project::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['like', 'tagid', $tagid]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        return $dataProvider;

    }
}
