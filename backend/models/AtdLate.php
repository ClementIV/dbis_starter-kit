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
 * This is the model class for table "{{%atd_late}}".
 *
 * @property int $lid
 * @property int $uid
 * @property string $date
 * @property int $category
 * @property AtdUser $u
 */
class AtdLate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%atd_late}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'date', 'category'], 'required'],
            [['uid', 'category'], 'integer'],
            [['date'], 'safe'],
            [['uid'], 'exist', 'skipOnError' => true, 'targetClass' => AtdUser::className(), 'targetAttribute' => ['uid' => 'uid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lid' => Yii::t('backend', 'Late ID'),
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

    /*
     * @param $uid user id
     * @param $date late Date
     * @param $timekey timezone
     * @return
     */
    public static function getLate($uid, $date, $timekey)
    {
        try {
            return self::find()
            ->Where(['uid' => $uid, 'date' => $date, 'category' => $timekey])
            ->count();
        } catch (Exception $e) {
            throw new Exception('Late exception', $e);
        }
    }
}
