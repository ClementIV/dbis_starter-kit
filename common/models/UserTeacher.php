<?php

namespace common\models;

use Yii;
use common\models\query\UserTeacherQuery;


/**
 * This is the model class for table "user_teacher".
 *
 * @property integer $userid
 * @property string $teacher_id
 * @property string $degree
 * @property string $title
 * @property string $telephone
 * @property string $direction
 * @property string $project
 * @property string $achievement
 * @property string $plurality
 * @property string $office
 * @property integer $status
 * @property  string $tagid
 */
class UserTeacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['userid', 'status'], 'integer'],
            [['plurality'], 'string'],
            [['teacher_id', 'degree', 'title', 'telephone'], 'string', 'max' => 20],
            [['direction',  'office'], 'string', 'max' => 255],
            [['project', 'achievement'],'string'],
            [['tagid'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => '教师id',
            'teacher_id' => '教职工编号',
            'degree' => '学历水平',
            'title' => '职称',
            'telephone' => '办公电话',
            'direction' => '研究方向',
            'project' => '项目',
            'achievement' => '主要成果',
            'plurality' => '社会职位',
            'office' => '办公地点',
            'status' => 'Status',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['userid'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     * @return UserTeacherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserTeacherQuery(get_called_class());
    }

    public static function findById($id)
    {
        return static::find()
            ->andWhere(['userid' => $id])
            ->one();
    }

    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'userid']);
    }
}
