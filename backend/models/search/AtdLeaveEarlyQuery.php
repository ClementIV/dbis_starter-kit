<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AtdLeaveEarly;

/**
 * AtdLeaveEarlyQuery represents the model behind the search form about `backend\models\AtdLeaveEarly`.
 */
class AtdLeaveEarlyQuery extends AtdLeaveEarly
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['leid', 'uid', 'category'], 'integer'],
            [['date'], 'safe'],
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
        $query = AtdLeaveEarly::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'leid' => $this->leid,
            'uid' => $this->uid,
            'date' => $this->date,
            'category' => $this->category,
        ]);

        return $dataProvider;
    }
}
