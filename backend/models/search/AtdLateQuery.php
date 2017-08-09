<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AtdLate;

/**
 * AtdLateQuery represents the model behind the search form about `backend\models\AtdLate`.
 */
class AtdLateQuery extends AtdLate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lid', 'uid', 'category'], 'integer'],
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
        $query = AtdLate::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'lid' => $this->lid,
            'uid' => $this->uid,
            'date' => $this->date,
            'category' => $this->category,
        ]);

        return $dataProvider;
    }
}
