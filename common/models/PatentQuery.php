<?php

namespace common\models\query;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Patent;

/**
 * PatentQuery represents the model behind the search form about `common\models\Patent`.
 */
class PatentQuery extends Patent
{
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
        $query = Patent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'patent_id' => $this->patent_id,
            'project_id' => $this->project_id,
            'application_date' => $this->application_date,
            'authorization_date' => $this->authorization_date,
            'attachment' => $this->attachment,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'inventors', $this->inventors])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'application_number', $this->application_number])
            ->andFilterWhere(['like', 'patent_number', $this->patent_number]);

        return $dataProvider;
    }

    public function searchByProjectId($projectid)
    {
        $query = Patent::find();

        $query->andFilterWhere([
            'project_id' => $projectid,
        ]);

        $model = $query->all();
        return $model;
    }
}
