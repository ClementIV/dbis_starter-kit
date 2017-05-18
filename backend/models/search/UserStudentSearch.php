<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserStudent;

/**
 * UserStudentSearch represents the model behind the search form about `common\models\UserStudent`.
 */
class UserStudentSearch extends UserStudent
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid', 'student_id', 'grade', 'status'], 'integer'],
            [['teacherid', 'direction', 'graduation', 'recommend'], 'safe'],
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
        $query = UserStudent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'userid' => $this->userid,
            'student_id' => $this->student_id,
            'grade' => $this->grade,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'teacherid', $this->teacherid])
            ->andFilterWhere(['like', 'direction', $this->direction])
            ->andFilterWhere(['like', 'graduation', $this->graduation])
            ->andFilterWhere(['like', 'recommend', $this->recommend]);

        return $dataProvider;
    }
}
