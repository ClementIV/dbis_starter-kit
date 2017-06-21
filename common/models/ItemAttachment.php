<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%item_attachment}}".
 *
 * @property integer $id
 * @property integer $item_id
 * @property string $base_url
 * @property string $path
 * @property string $url
 * @property string $name
 * @property string $type
 * @property string $size
 * @property integer $order
 * @property integer $itemtype
 * @property Article $article
 */
class ItemAttachment extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%item_attachment}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_id', 'path'], 'required'],
            [['item_id', 'size', 'order','itemtype'], 'integer'],
            [['base_url', 'path', 'type', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'item_id' => Yii::t('common', 'Article ID'),
            'base_url' => Yii::t('common', 'Base Url'),
            'path' => Yii::t('common', 'Path'),
            'size' => Yii::t('common', 'Size'),
            'order' => Yii::t('common', 'Order'),
            'type' => Yii::t('common', 'Type'),
            'name' => Yii::t('common', 'Name')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'item_id']);
    }

    public function getUrl()
    {
        return $this->base_url . '/' . $this->path;
    }

    public function getSoftware()
    {
        return $this->hasOne(Software::className(), ['softid' => 'item_id']);
    }

    public function getItemType()
    {
        return $this->itemtype;
    }


    public function setItemType($itemType)
    {
        $this->itemtype=$itemType;
    }
}
