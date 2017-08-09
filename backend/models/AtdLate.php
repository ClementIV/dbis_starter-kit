<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%atd_late}}".
 *
 * @property integer $lid
 * @property integer $uid
 * @property string $date
 * @property integer $category
 *
 * @property AtdUser $u
 */
class AtdLate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atd_late}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid','date','category'],'required'],
            [['uid', 'category'], 'integer'],
            [['date'], 'safe'],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => AtdUser::className(), 'targetAttribute' => ['uid' => 'uid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'lid' =>Yii::t('backend','Late ID'),
            'uid' => Yii::t('backend', 'User ID'),
            'date' => Yii::t('backend', 'Date'),
            'category' => Yii::t('backend', 'Late Time'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(AtdUser::className(), ['uid' => 'uid']);
    }
}
