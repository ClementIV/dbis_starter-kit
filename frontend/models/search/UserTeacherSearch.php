<?php

namespace frontend\models\search;
use common\models\UserTeacher;
use common\models\UserProfile;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * This is the ActiveQuery class for [[UserTeacher]].
 *
 * @see UserTeacher
 */
class UserTeacherSearch extends UserTeacher
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserTeacher[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserTeacher|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function searchUserProfile($params)
    {
        $ids="";
        $teachers=UserTeacher::find()->all();
        foreach ($teachers as $key =>$val)
        {
            $ids.=$val['userid'].',';
        }
        $ids=substr($ids,0,-1);
        $ids=explode(',',$ids);
        $query = UserProfile::find()->where(['user_id'=>$ids]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchUserTeacherById($id)
    {
        $model = (new Query()) ->from(['dbis_user_profile','dbis_user_teacher','dbis_user'])->where('dbis_user_teacher.userid=dbis_user_profile.user_id')->andWhere(['userid'=>$id])->andWhere('dbis_user_teacher.userid=dbis_user.id')->one();
        return $model;
    }

    public function searchTeacherInfo($params)
    {
        //$query = UserTeacher::find()->leftJoin('user_profile','user_teacher.userid=user_profile.user_id');
        $query =new Query();
        $query=$query->from(['dbis_user_profile','dbis_user_teacher'])->where('dbis_user_teacher.userid=user_profile.user_id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        return $dataProvider;


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rating' => $this->rating,
            'frequency' => $this->frequency,
        ]);

        $query->andFilterWhere(['like', 'tagname', $this->tagname]);

        return $dataProvider;

    }

    public function searchTeacherwithTag($tagid)
    {
        //$query = UserTeacher::find()->leftJoin('user_profile','user_teacher.userid=user_profile.user_id');
        $query =new Query();
        $query=$query->from(['dbis_user_profile','dbis_user_teacher'])->where('dbis_user_teacher.userid=dbis_user_profile.user_id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);

        $query->andFilterWhere(['like', 'tagid', $tagid]);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        return $dataProvider;

    }

}
