<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%atd_month_attendance}}".
 *
 * @property int $caid
 * @property int $uid
 * @property string $atd_date
 * @property int $morning_in
 * @property int $morning_early_leave
 * @property int $morning_late
 * @property int $afternoon_in
 * @property int $afternoon_late
 * @property int $afternoon_ealy_leave
 * @property int $work_time
 * @property AtdUser $u
 */
class AtdMonthAttendance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%atd_month_attendance}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'morning_in', 'morning_early_leave', 'morning_late', 'afternoon_in', 'afternoon_late', 'afternoon_ealy_leave'], 'integer'],
            [['atd_date'], 'safe'],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => AtdUser::className(), 'targetAttribute' => ['uid' => 'uid']],
        ];
    }

    /**
     * {@inheritdoc}
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

    /*
     * @param int $uid
     * @param string $dataProvider
     * @return the number of one's month record
     */
    public static function getOneMonthRecord($uid, $date)
    {
        $result = [];
        $nextMonth = date('Y-m-d', strtotime($date.'+1 month'));

        try {
            $result = self::find()
                ->Where(['{{%atd_month_attendance}}.uid' => $uid])
                ->andWhere(['>=', 'atd_date', $date])
                ->andWhere(['<', 'atd_date', $nextMonth])
                ->rightJoin('{{%view_info}}', '{{%view_info.uid}}={{%atd_month_attendance.uid}}')
                ->select(['real_name','ccid','{{%atd_month_attendance}}.*', 'DATE_FORMAT(atd_date , "%Y-%m") as atd_date'])
                ->asArray()
                ->All();

            return $result;
        } catch (Exception $e) {
            throw new Exception('Error Processing Request in one month record!', $e);
        }
    }

    /*
     * @param string $dataProvider
     * @return the number of one's month record
     */
    public static function getAllMonthRecord($date)
    {
        $result = [];
        $nextMonth = date('Y-m-d', strtotime($date.'+1 month'));

        try {
            $result = self::find()
                ->Where(['>=', 'atd_date', $date])
                ->andWhere(['<', 'atd_date', $nextMonth])
                ->rightJoin('{{%view_info}}', '{{%view_info.uid}}={{%atd_month_attendance.uid}}')
                ->select(['real_name','ccid','{{%atd_month_attendance}}.*', 'DATE_FORMAT(atd_date , "%Y-%m") as atd_date'])
                ->orderBy('ccid')
                ->asArray()
                ->All();

            return $result;
        } catch (Exception $e) {
            throw new Exception('Error Processing Request in one month record!', $e);
        }
    }
    /*
     *@param $person array include all attendance result
     *
     * @return
     */
    public function storeAll($person)
    {
        $this->uid = $person['uid'];
        $this->atd_date = $person['date'];
        $this->morning_in = $person['morning_in'];
        $this->morning_early_leave = $person['morning_early'];
        $this->morning_late = $person['morning_late'];
        $this->afternoon_in = $person['afternoon_in'];
        $this->afternoon_late = $person['afternoon_late'];
        $this->afternoon_ealy_leave = $person['afternoon_early'];
        $this->save();
    }
}
