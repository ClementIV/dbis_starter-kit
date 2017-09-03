<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%atd_department}}".
 *
 * @property integer $did
 * @property string $name
 * @property integer $state
 *
 * @property AtdUser[] $atdUsers
 */
class AtdDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atd_department}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['did'], 'required'],
            [['did', 'state'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'did' => Yii::t('backend', 'Department id'),
            'name' => Yii::t('backend', 'Department Name'),
            'state' => Yii::t('backend', 'Department State'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdUsers()
    {
        return $this->hasMany(AtdUser::className(), ['did' => 'did']);
    }
}
