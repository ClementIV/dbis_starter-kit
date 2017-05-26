<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $id
 * @property string $tagname
 * @property integer $rating
 * @property integer $frequency
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tagname'], 'required'],
            [['rating', 'frequency'], 'integer'],
            [['tagname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tagname' => '标签名',
            'rating' => '标签重要性',
            'frequency' => '搜索次数',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TagQuery(get_called_class());
    }

    public function getTagName()
    {
        return $this->tagname;
    }

}
