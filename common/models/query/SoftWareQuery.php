<?php

namespace common\models\query;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Software;

/**
 * SoftWareQuery represents the model behind the search form about `common\models\Software`.
 */
class SoftwareQuery extends Software
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
        $query = Software::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'softid' => $this->softid,
            'finishtime' => $this->finishtime,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'regisnumber', $this->regisnumber])
            ->andFilterWhere(['like', 'enclosure', $this->enclosure]);

        return $dataProvider;
    }

    public function searchByProjectId($projectid)
    {
        $query = Software::find();


        $query->andFilterWhere([
            'softid' => $projectid,
        ]);

        $model = $query->all();
        return $model;
    }
}
