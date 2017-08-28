<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%atd_month_attendance}}".
 *
 * @property integer $caid
 * @property integer $uid
 * @property string $atd_date
 * @property integer $morning_in
 * @property integer $morning_early_leave
 * @property integer $morning_late
 * @property integer $afternoon_in
 * @property integer $afternoon_late
 * @property integer $afternoon_ealy_leave
 * @property integer $work_time
 *
 * @property AtdUser $u
 */
class AtdMonthAttendance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atd_month_attendance}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'morning_in', 'morning_early_leave', 'morning_late', 'afternoon_in', 'afternoon_late', 'afternoon_ealy_leave',], 'integer'],
            [['atd_date'], 'safe'],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => AtdUser::className(), 'targetAttribute' => ['uid' => 'uid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'caid' => Yii::t('backend', 'Caid'),
            'uid' => Yii::t('backend', 'Uid'),
            'atd_date' => Yii::t('backend', '日期'),
            'morning_in' => Yii::t('backend', '早上情况 0-未来；1-正常 ；2-迟到 ；3-早退； 4 -迟到并早退 5-请公假 6-事假 7-病假'),
            'morning_early_leave' => Yii::t('backend', 'Morning Early Leave'),
            'morning_late' => Yii::t('backend', 'Morning Late'),
            'afternoon_in' => Yii::t('backend', 'Afternoon In'),
            'afternoon_late' => Yii::t('backend', 'Afternoon Late'),
            'afternoon_ealy_leave' => Yii::t('backend', 'Afternoon Ealy Leave'),
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
