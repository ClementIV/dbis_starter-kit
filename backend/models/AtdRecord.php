<?php

namespace backend\models;

use backend\models\AtdUser;

/**
 * This is the model class for table "dbis_atd_record".
 *
 * @property integer $rid
 * @property integer $ccid
 * @property string $clock_time
 * @property integer $verify
 */
class AtdRecord extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbis_atd_record';
    }

    /**
     * @inheritdoc
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
     * @inheritdoc
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
     *  传入当前人的id,返回四个时间段是否存在的数组
     */
    public static function getRecordById($uid)
    {
        //做根据日期和ccid返回一个数组带四个值
        $ccid = AtdUser::findOne($uid)['ccid'];

        $time1 = date('Y-m-d').date(" 07:00:00");
        $time2 = date('Y-m-d').date(" 09:00:00");
        $time3 = date('Y-m-d').date(" 11:30:00");
        $time4 = date('Y-m-d').date(" 12:50:00");
        $time5 = date('Y-m-d').date(" 13:00:00");
        $time6 = date('Y-m-d').date(" 14:00:00");
        $time7 = date('Y-m-d').date(" 17:30:00");
        $time8 = date('Y-m-d').date(" 18:50:00");

        $result = [];
        $result[0] = AtdRecord::find()
            ->where(['ccid'=>$ccid])
            ->andWhere(['>','clock_time',$time1])
            ->andWhere(['<','clock_time',$time2])
            ->count() ;
        $result[1] = AtdRecord::find()
            ->where(['ccid'=>$ccid])
            ->andWhere(['>','clock_time',$time3])
            ->andWhere(['<','clock_time',$time4])
            ->count() ;
        $result[2] = AtdRecord::find()
            ->where(['ccid'=>$ccid])
            ->andWhere(['>','clock_time',$time5])
            ->andWhere(['<','clock_time',$time6])
            ->count() ;
        $result[3] = AtdRecord::find()
            ->where(['ccid'=>$ccid])
            ->andWhere(['>','clock_time',$time7])
            ->andWhere(['<','clock_time',$time8])
            ->count() ;
        return $result;
    }
}
