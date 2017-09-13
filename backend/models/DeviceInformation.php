<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%device_information}}".
 *
 * @property integer $diid
 * @property string $deparment
 * @property string $student_id
 * @property string $uid
 * @property integer $seat_number
 * @property string $host
 * @property string $host_number
 * @property string $SSD
 * @property string $monitor_number1
 * @property string $monitor_type1
 * @property integer $monitor_size1
 * @property string $monitor_number2
 * @property string $monitor_type2
 * @property integer $monitor_size2
 * @property string $ip
 * @property string $MAC
 * @property string $update
 */
class DeviceInformation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%device_information}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seat_number', 'monitor_size1', 'monitor_size2'], 'integer'],
            [['update'], 'safe'],
            [['deparment', 'student_id', 'uid', 'host', 'host_number', 'SSD', 'monitor_number1', 'monitor_type1', 'monitor_number2', 'monitor_type2', 'ip', 'MAC'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'diid' => Yii::t('backend', 'Diid'),
            'deparment' => Yii::t('backend', '部门号'),
            'student_id' => Yii::t('backend', 'Student ID'),
            'uid' => Yii::t('backend', 'Uid'),
            'seat_number' => Yii::t('backend', 'Seat Number'),
            'host' => Yii::t('backend', 'Host'),
            'host_number' => Yii::t('backend', 'Host Number'),
            'SSD' => Yii::t('backend', 'Ssd'),
            'monitor_number1' => Yii::t('backend', 'Monitor Number1'),
            'monitor_type1' => Yii::t('backend', 'Monitor Type1'),
            'monitor_size1' => Yii::t('backend', 'Monitor Size1'),
            'monitor_number2' => Yii::t('backend', 'Monitor Number2'),
            'monitor_type2' => Yii::t('backend', 'Monitor Type2'),
            'monitor_size2' => Yii::t('backend', 'Monitor Size2'),
            'ip' => Yii::t('backend', 'Ip'),
            'MAC' => Yii::t('backend', 'Mac'),
            'update' => Yii::t('backend', 'Update'),
        ];
    }
}
