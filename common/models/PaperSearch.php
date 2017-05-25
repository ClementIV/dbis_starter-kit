<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Paper;

/**
 * PaperSearch represents the model behind the search form about `common\models\Paper`.
 */
class PaperSearch extends Paper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'publishTime', 'projectId'], 'integer'],
            [['title', 'author', 'journalName'], 'safe'],
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
}
