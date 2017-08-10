<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%atd_leave_early}}".
 *
 * @property integer $leid
 * @property integer $uid
 * @property string $date
 * @property integer $category
 *
 * @property AtdUser $u
 */
class AtdLeaveEarly extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atd_leave_early}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid','date','category'],'required'],
            [['uid', 'category'], 'integer'],
            [['date'], 'safe'],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => AtdUser::className(), 'targetAttribute' => ['uid' => 'uid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'leid' => Yii::t('backend', 'Leave Early ID'),
            'uid' => Yii::t('backend', 'User ID'),
            'date' => Yii::t('backend', 'Date'),
            'category' => Yii::t('backend', 'Leave Early Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(AtdUser::className(), ['uid' => 'uid']);
    }
}
