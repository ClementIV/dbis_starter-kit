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

/**
 * This is the model class for table "dbis_atd_record".
 *
 * @property int $rid
 * @property int $ccid
 * @property string $clock_time
 * @property int $verify
 */
class AtdRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%atd_record}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ccid', 'verify'], 'integer'],
            [['clock_time'], 'required'],
            [['clock_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rid' => 'Rid',
            'ccid' => 'Ccid',
            'clock_time' => 'Clock Time',
            'verify' => 'Verify',
        ];
    }

    /**
     *  传�
     * �当前人的id,返回四个时间段是否存在的数组.
     *
     * @param mixed $uid
     */
    public static function getRecordById($uid)
    {
        try {
            $rule = AtdRule::getRule();
            //做根据日期和ccid返回一个数组带四个值
            $ccid = AtdUser::findOne($uid)['ccid'];

            $time1 = date('Y-m-d ').date($rule['morning_begin']);
            $time2 = date('Y-m-d ').date($rule['morning_in']);
            $time3 = date('Y-m-d ').date($rule['morning_out']);
            $time4 = date('Y-m-d ').date($rule['morning_end']);
            $time5 = date('Y-m-d ').date($rule['afternoon_begin']);
            $time6 = date('Y-m-d ').date($rule['afternoon_in']);
            $time7 = date('Y-m-d ').date($rule['afternoon_out']);
            $time8 = date('Y-m-d ').date($rule['afternoon_end']);

            $result = [];
            $result[0] = self::find()
            ->where(['ccid' => $ccid])
            ->andWhere(['>', 'clock_time', $time1])
            ->andWhere(['<=', 'clock_time', $time2])
            ->count();
            $result[1] = self::find()
            ->where(['ccid' => $ccid])
            ->andWhere(['>=', 'clock_time', $time3])
            ->andWhere(['<', 'clock_time', $time4])
            ->count();
            $result[2] = self::find()
            ->where(['ccid' => $ccid])
            ->andWhere(['>', 'clock_time', $time5])
            ->andWhere(['<=', 'clock_time', $time6])
            ->count();
            $result[3] = self::find()
            ->where(['ccid' => $ccid])
            ->andWhere(['>=', 'clock_time', $time7])
            ->andWhere(['<', 'clock_time', $time8])
            ->count();

            return [$result, $rule];
        } catch (Exception $e) {
            throw new Exception('Record model Exception',$e);
        }
    }

    // get a record in work time
    // if not exist return null;
    /* @param int $ccid
     * @param date $date
     * @param int $category(1=>morning;2=>afternoon)
     * @return Count
     */
    public static function getLateRecord($ccid, $date, $categroy)
    {
        $result = 0;

        try {
            $rule = AtdRule::getRule();
            $morning_in = date($date).' '.date($rule['morning_in']);
            $morining_out = date($date).' '.date($rule['morning_out']);
            $afternoon_in = date($date).' '.date($rule['afternoon_in']);
            $afternoon_out = date($date).' '.date($rule['afternoon_out']);
            if ($categroy === 1) {
                $result = self::find()
                    ->where(['ccid' => $ccid])
                    ->andWhere(['>', 'clock_time', $morning_in])
                    ->andWhere(['<', 'clock_time', $morining_out])
                    ->count();
            } elseif ($categroy === 2) {
                $result = self::find()
                    ->where(['ccid' => $ccid])
                    ->andWhere(['>', 'clock_time', $afternoon_in])
                    ->andWhere(['<', 'clock_time', $afternoon_out])
                    ->count();
            }

            return $result;
        } catch (Exception $e) {
            throw new Exception('Error Processing Request', $e);
            //return $result[];
        }
    }

    /* @param int $ccid
     * @param date $date
     * @param int $verify
     * @param string $time
     * @return history record
     * if verify == 1 return attendance machine record
     * if verify == 2 return apply leave
    */
    public static function getHistoryRecord($ccid, $date, $verify, $time)
    {
        $result = [];

        try {
            $rule = AtdRule::getRule();
            $time_begin = date($date).' '.date($rule[$time.'_begin']);
            $time_in = date($date).' '.date($rule[$time.'_in']);
            $time_out = date($date).' '.date($rule[$time.'_out']);
            $time_end = date($date).' '.date($rule[$time.'_end']);
            $result[$time.'_in'] = self::find()
                ->Where(['ccid' => $ccid, 'verify' => $verify])
                ->andWhere(['>=', 'clock_time', $time_begin])
                ->andWhere(['<=', 'clock_time', $time_in])
                ->count();
            $result[$time.'_out'] = self::find()
                ->Where(['ccid' => $ccid, 'verify' => $verify])
                ->andWhere(['>=', 'clock_time', $time_out])
                ->andWhere(['<=', 'clock_time', $time_end])
                ->count();

            return $result;
        } catch (Exception $e) {
            throw new Exception('Error Processing Request', $e);
        }
    }
    
}
