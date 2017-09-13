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
 * This is the model class for table "{{%atd_user}}".
 *
 * @property int $uid
 * @property int $did
 * @property string $ccid
 * @property string $pwd
 * @property int $auth
 * @property int $state
 * @property int $checkin
 * @property AtdLate[] $atdLates
 * @property AtdLeave[] $atdLeaves
 * @property AtdLeaveEarly[] $atdLeaveEarlies
 * @property AtdMonthAttendance[] $atdMonthAttendances
 * @property AtdRecord[] $atdRecords
 * @property AtdDepartment $d
 * @property User $u
 */
class AtdUser extends \yii\db\ActiveRecord
{
    public $real_name;
    public $deptname;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%atd_user}}';
    }

    //public $uid;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
            [['uid'], 'required'],
            [['uid', 'did', 'auth', 'state', 'checkin'], 'integer'],
            [['ccid', 'pwd', 'real_name'], 'string', 'max' => 255],
            [['ccid'], 'unique'],
            [['did'], 'exist', 'skipOnError' => true, 'targetClass' => AtdDepartment::className(), 'targetAttribute' => ['did' => 'did']],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['uid' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'real_name' => Yii::t('backend', 'real_name'),
            'deptname' => Yii::t('backend', 'department'),
            'uid' => Yii::t('backend', 'User ID'),
            'did' => Yii::t('backend', 'department'),
            'ccid' => Yii::t('backend', 'Ccid'),
            'pwd' => Yii::t('backend', 'Password'),
            'auth' => Yii::t('backend', 'Equipment authority'),
            'state' => Yii::t('backend', '0为正常，1为已删除'),
            'checkin' => Yii::t('backend', 'Checkin'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdLates()
    {
        return $this->hasMany(AtdLate::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdLeaves()
    {
        return $this->hasMany(AtdLeave::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdLeaveEarlies()
    {
        return $this->hasMany(AtdLeaveEarly::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdMonthAttendances()
    {
        return $this->hasMany(AtdMonthAttendance::className(), ['uid' => 'uid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdRecords()
    {
        return $this->hasMany(AtdRecord::className(), ['ccid' => 'ccid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getD()
    {
        return $this->hasOne(AtdDepartment::className(), ['did' => 'did']);
    }

    public function getAllD()
    {
        return AtdDepartment::find()->asArray()->all();
    }

    public function getRealName()
    {
        return $this->hasOne(VeiwInfo::className(), ['real_name' => 'real_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }

    // @params int $id uid
    public static function getOne($id)
    {
        return   self::find()
            ->rightJoin('{{%atd_department}}', '{{%atd_department.did}}={{%atd_user.did}}')
            ->select(['{{%atd_department}}.name as deptname', '{{%atd_user}}.uid as uid', '{{%atd_user}}.*'])
            ->Where(['uid' => $id])
            ->one();

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
