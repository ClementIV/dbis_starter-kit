<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserTeacher;

/**
 * TeachertSearch represents the model behind the search form about `common\models\UserTeacher`.
 */
class TeachertSearch extends UserTeacher
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'status'], 'integer'],
            [['teacher_id', 'degree', 'title', 'telephone', 'direction', 'project', 'achievement', 'plurality', 'office'], 'safe'],
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
        $query = UserTeacher::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'userid' => $this->userid,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'teacher_id', $this->teacher_id])
            ->andFilterWhere(['like', 'degree', $this->degree])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'direction', $this->direction])
            ->andFilterWhere(['like', 'project', $this->project])
            ->andFilterWhere(['like', 'achievement', $this->achievement])
            ->andFilterWhere(['like', 'plurality', $this->plurality])
            ->andFilterWhere(['like', 'office', $this->office]);

        return $dataProvider;
    }
}
