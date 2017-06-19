<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_student".
 *
 * @property integer $userid
 * @property integer $student_id
 * @property integer $grade
 * @property string $teacherid
 * @property string $telephone
 * @property string $direction
 * @property string $graduation
 * @property string $workplace
 * @property integer $status
 * @property string $recommend
 * @property int $tagid
 */
class UserStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_student}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['userid', 'student_id', 'grade', 'status'], 'integer'],
            [['recommend'], 'string'],
            [['teacherid'], 'string', 'max' => 20],
            [['direction', 'graduation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => '学生id',
            'student_id' => '学号',
            'grade' => '入学年份',
            'teacherid' => '指导老师',
            'telephone' => '联系电话',
            'direction' => '研究方向',
            'graduation' => '毕业去向',
            'workplace' => '工作地',
            'status' => '最高学历',
            'recommend' => '寄语',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UserStudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserStudentQuery(get_called_class());
    }

    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'userid']);
    }


    public static function findById($id)
    {
        return static::find()
            ->andWhere(['userid' => $id])
            ->one();
    }
}
