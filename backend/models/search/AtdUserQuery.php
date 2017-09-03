<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\AtdUser;

/**
 * AtduserQuery represents the model behind the search form about `backend\models\AtdUser`.
 */
class AtduserQuery extends AtdUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['real_name','string']],
            [['uid', 'did', 'auth', 'state', 'checkin'], 'integer'],
            [['ccid', 'pwd'], 'safe'],
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

        $query = AtdUser::find()
        -> rightJoin('{{%view_info}}', '{{%view_info.ccid}}={{%atd_user.ccid}}')
        ->select('{{%view_info}}.*');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'real_name'=> $this->real_name,
            'uid' => $this->uid,
            'did' => $this->did,
            'auth' => $this->auth,
            'state' => $this->state,
            'checkin' => $this->checkin,
        ]);

        $query->andFilterWhere(['like', 'ccid', $this->ccid])
            ->andFilterWhere(['like', 'pwd', $this->pwd]);

        return $dataProvider;
    }
    
}
