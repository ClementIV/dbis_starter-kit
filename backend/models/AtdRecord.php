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
     * find one's whole record by ccid
     */
    public static function getRecordById($uid)
    {
        //做根据日期和ccid返回一个数组带四个值
        $ccid = AtdUser::findOne($uid)['ccid'];

        $time1 = date('Y-m-d').date(" 08:30:00");
        $time2 = date('Y-m-d').date(" 09:00:00");

        print_r(
            AtdRecord::find()
            ->where(['ccid'=>$ccid])
            ->asArray()
            ->all()
        );
//        return AtdRecord::find()
//            ->where(['ccid'=>$ccid,])
//            ->asArray()
//            ->all();
    }
}
