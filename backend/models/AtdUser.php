<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dbis_atd_user".
 *
 * @property integer $uid
 * @property integer $did
 * @property string $ccid
 * @property string $pwd
 * @property integer $auth
 * @property integer $state
 *
 * @property AtdAfk[] $atdAfks
 * @property AtdLeave[] $atdLeaves
 * @property AtdRecord[] $atdRecords
 * @property AtdDepartment $d
 * @property User $u
 */
class AtdUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atd_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'did', 'auth', 'state'], 'integer'],
            [['ccid', 'pwd'], 'string', 'max' => 255],
            [['ccid'], 'unique'],
            [['did'], 'exist', 'skipOnError' => true, 'targetClass' => AtdDepartment::className(), 'targetAttribute' => ['did' => 'did']],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['uid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'did' => 'Did',
            'ccid' => 'Ccid',
            'pwd' => 'Pwd',
            'auth' => 'Auth',
            'state' => 'State',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdAfks()
    {
        return $this->hasMany(AtdAfk::className(), ['uid' => 'uid']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }
}
