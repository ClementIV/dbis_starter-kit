<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%atd_rule}}".
 *
 * @property integer $ruid
 * @property string $morning_begin
 * @property string $morning_end
 * @property string $morining_in
 * @property string $morining_out
 * @property string $afternoon_begin
 * @property string $afternoon_end
 * @property string $afternoon_in
 * @property string $afternoon_out
 */
class AtdRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%atd_rule}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ruid', 'morning_begin'], 'required'],
            [['ruid'], 'integer'],
            [['morning_begin', 'morning_end', 'morining_in', 'morining_out', 'afternoon_begin', 'afternoon_end', 'afternoon_in', 'afternoon_out'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ruid' => 'Ruid',
            'morning_begin' => 'Morning Begin',
            'morning_end' => 'Morning End',
            'morining_in' => 'Morining In',
            'morining_out' => 'Morining Out',
            'afternoon_begin' => 'Afternoon Begin',
            'afternoon_end' => 'Afternoon End',
            'afternoon_in' => 'Afternoon In',
            'afternoon_out' => 'Afternoon Out',
        ];
    }
    /**
     * 取得这一行
     */
    public static function getRule()
    {
        return AtdRule::findOne(1);
    }

}
