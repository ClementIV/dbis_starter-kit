<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "view_info".
 *
 * @property integer $uid
 * @property string $username
 * @property string $deptname
 * @property string $ccid
 * @property string $email
 */
class ViewInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%view_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'email'], 'required'],
            [['uid'], 'integer'],
            [['username'], 'string', 'max' => 32],
            [['deptname', 'ccid', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'username' => 'Username',
            'deptname' => 'Deptname',
            'ccid' => 'Ccid',
            'email' => 'Email',
        ];
    }
    /**
     * 传入uid，返回这个uid的个人信息
     */
    public static function getInfoById($uid)
    {
        //Array ( [uid] => 92 [username] => fyq [deptname] => 530 [ccid] => 113 [email] => 1655@qq.com ) )
        return ViewInfo::find()
            ->where(['uid'=>$uid])
            ->asArray()
            ->all();
    }
    public static function getAllCheckin($deptname)
    {
        return ViewInfo::find()
            ->Where(['deptname'=>$deptname,])
            ->orderBy('ccid')
            ->asArray()
            ->all();
    }
    /*
     * @return all attendance user
     */
    public static function getAllUser()
    {
        return self::find()
            ->select(['uid','ccid','real_name'])
            ->asArray()
            ->all();
    }
    public function getInfoUser()
    {
        return self::find()
            ->select(['uid','ccid','real_name']);

    }
}
