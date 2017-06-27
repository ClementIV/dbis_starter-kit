<?php

namespace common\models\query;;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Paper;

/**
 * PaperSearch represents the model behind the search form about `common\models\Paper`.
 */
class PaperQuery extends Paper
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
        $query = Paper::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'publishTime' => $this->publishTime,
            'projectId' => $this->projectId,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'journalName', $this->journalName]);

        return $dataProvider;
    }

    public function searchByProjectId($projectid)
    {
        $query = Paper::find();

        $query->andFilterWhere([
            'project_id' => $projectid,
        ]);

        $model = $query->all();
        return $model;
    }
}
