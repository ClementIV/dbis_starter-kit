<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $access_token
 * @property string $password_hash
 * @property string $oauth_client
 * @property string $oauth_client_user_id
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $logged_at
 *
 * @property Article[] $articles
 * @property Article[] $articles0
 * @property AtdLeave[] $atdLeaves
 * @property AtdUser $atdUser
 * @property UserProfile $userProfile
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['auth_key', 'access_token', 'password_hash', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'logged_at'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['access_token'], 'string', 'max' => 40],
            [['password_hash', 'oauth_client', 'oauth_client_user_id', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'username' => Yii::t('backend', 'Username'),
            'auth_key' => Yii::t('backend', 'Auth Key'),
            'access_token' => Yii::t('backend', 'Access Token'),
            'password_hash' => Yii::t('backend', 'Password Hash'),
            'oauth_client' => Yii::t('backend', 'Oauth Client'),
            'oauth_client_user_id' => Yii::t('backend', 'Oauth Client User ID'),
            'email' => Yii::t('backend', 'Email'),
            'status' => Yii::t('backend', 'Status'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'logged_at' => Yii::t('backend', 'Logged At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles0()
    {
        return $this->hasMany(Article::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdLeaves()
    {
        return $this->hasMany(AtdLeave::className(), ['tid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdUser()
    {
        return $this->hasOne(AtdUser::className(), ['uid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'id']);
    }
}
