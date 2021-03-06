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
 * This is the model class for table "{{%atd_leave_early}}".
 *
 * @property int $leid
 * @property int $uid
 * @property string $date
 * @property int $category
 * @property AtdUser $u
 */
class AtdLeaveEarly extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%atd_leave_early}}';
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
            'leid' => Yii::t('backend', 'Leave Early ID'),
            'uid' => Yii::t('backend', 'User ID'),
            'date' => Yii::t('backend', 'Date'),
            'category' => Yii::t('backend', 'Leave Early Time'),
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
     * @param $date Early Leave Date
     * @param $timekey timezone
     * @return
     */
    public static function getEarlyLeaveRecord($uid, $date, $timekey)
    {
        try {
            return self::find()
            ->Where(['uid' => $uid, 'date' => $date, 'category' => $timekey])
            ->count();
        } catch (Exception $e) {
            throw new Exception('Earyleave model Exception', $e);
        }
    }
    /*
     * @param $uid user id
     * @param $timekey timezone
     * @return number of user early leave
     */
    public static function getOneEarlyNum($uid, $timekey){
        $result = 0;

        try {
            $result = self::find()
            ->Where(['uid' => $uid, 'category' => $timekey])
            ->select(['count(*) as early_num'])
            ->asArray()
            ->all();
            if (!empty($result)) {
                return $result;
            }

            return 0;
        } catch (Exception $e) {
            throw new Exception('Early Leave exception', $e);
        }
    }
}
