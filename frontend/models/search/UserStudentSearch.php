<?php

namespace frontend\models\search;
use common\models\UserStudent;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * This is the ActiveQuery class for [[\common\models\UserStudent]].
 *
 * @see \common\models\UserStudent
 */
class UserStudentSearch extends UserStudent
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\UserStudent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\UserStudent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function searchStudent($params)
    {
        $query = UserStudent::find();
        $query ->joinWith(['userProfile']);
        $query -> select("dbis_user_student.*,dbis_user_profile.*");
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

    public function searchStudent1($params)
    {
        $query = UserStudent::find();
        $query ->joinWith(['userProfile']);
        $query -> select("dbis_user_student.*,dbis_user_profile.*")->where('recommend!=null');
        $model = $query->all();
        return $model;
    }



    public function searchTeacherById($id)
    {
        $model =(new Query()) ->from(['dbis_user_profile','dbis_user_teacher','dbis_user'])->where('dbis_user_teacher.userid=dbis_user_profile.user_id')->andWhere(['userid'=>$id])->andWhere('dbis_user_teacher.userid=dbis_user.id')->one();
        return $model;
    }
}
