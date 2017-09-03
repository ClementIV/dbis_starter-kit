<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%atd_leave_category}}".
 *
 * @property integer $cid
 * @property string $category
 * @property integer $agree
 *
 * @property AtdLeave[] $atdLeaves
 */
class AtdLeaveCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atd_leave_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agree'], 'integer'],
            [['category'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cid' => Yii::t('backend', 'Category ID'),
            'category' => Yii::t('backend', 'leave Categories'),
            'agree' => Yii::t('backend', 'Need Confirm'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtdLeaves()
    {
        return $this->hasMany(AtdLeave::className(), ['cid' => 'cid']);
    }
}
