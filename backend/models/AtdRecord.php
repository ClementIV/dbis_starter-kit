<?php

namespace backend\models;

use backend\models\AtdUser;
use backend\models\AtdRule;
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
        return '{{%atd_record}}';
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
        $rule = AtdRule::getRule();
        //做根据日期和ccid返回一个数组带四个值
        $ccid = AtdUser::findOne($uid)['ccid'];

        $time1 = date('Y-m-d ').date($rule['morning_begin']);
        $time2 = date('Y-m-d ').date($rule['morining_in']);
        $time3 = date('Y-m-d ').date($rule['morining_out']);
        $time4 = date('Y-m-d ').date($rule['morning_end']);
        $time5 = date('Y-m-d ').date($rule['afternoon_begin']);
        $time6 = date('Y-m-d ').date($rule['afternoon_in']);
        $time7 = date('Y-m-d ').date($rule['afternoon_out']);
        $time8 = date('Y-m-d ').date($rule['afternoon_end']);

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

        return [$result,$rule];
    }
    // get a record in moring work time
    // if not exist return null;
    public static function getLateRecord($ccid,$data,$categroy)
    {
        $result = [];
        try{
            $rule = AtdRule::getRule();
            $morning_in = date($data).' '.date($rule['morining_in']);
            $morining_out = date($data).' '.date($rule['morining_out']);
            $afternoon_in = date($data).' '.date($rule['afternoon_in']);
            $afternoon_out = date($data).' '.date($rule['afternoon_out']);
            if ($categroy == 1){
                $result = AtdRecord::find()
                    ->where(['ccid'=>$ccid,])
                    ->andWhere(['>','clock_time',$morning_in])
                    ->andWhere(['<','clock_time',$morining_out])
                    ->count();

            } else if ($categroy == 2){
                $result = AtdRecord::find()
                    ->where(['ccid'=>$ccid,])
                    ->andWhere(['>','clock_time',$afternoon_in])
                    ->andWhere(['<','clock_time',$afternoon_out])
                    ->count();
            }
            return $result;
        }catch(Exception $e){
            throw new Exception("Error Processing Request", $e);
            //return $result[];
        }
    }
}
