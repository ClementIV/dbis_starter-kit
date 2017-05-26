<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 *  @property string $summary
 * @property string $body
 * @property integer $category_id
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property integer $status
 * @property integer $created_by
 * @property integer $published_at
 * @property string $touser
 * @property string $toparty
 * @property integer $begintime
 * @property integer $endtime
 * @property string $place
 */
class Post extends \yii\db\ActiveRecord
{

    public $thumbnail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['summary','body','place', 'created_by'], 'string'],
            [['thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [[ 'thumbnail','touser','toparty','published_at','begintime','endtime'], 'safe'],
            [['published_at','begintime','endtime'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['published_at','begintime','endtime'], 'filter', 'filter' => 'strtotime', 'skipOnEmpty' => true],
            ['begintime', 'compare', 'compareValue' => 'endtime', 'operator' => '<']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'title' => Yii::t('common', 'Title'),
            'summary' => Yii::t('common','Summary'),
            'body' => Yii::t('common', 'Body'),
            'thumbnail' => Yii::t('common', 'Thumbnail'),
            'category_id' => Yii::t('common', 'Category'),
            'status' => Yii::t('common', 'Published'),
            'published_at' => Yii::t('common', 'Published At'),
            'created_by' => Yii::t('common', 'Author'),
            'created_at' => Yii::t('common', 'Created At'),
            'touser' => Yii::t('common', 'ToUser'),
            'toparty' => Yii::t('common', 'ToParty'),
            'begintime' => Yii::t('common', 'BeginTime'),
            'endtime' => Yii::t('common', 'EndTime'),
            'place' => Yii::t('common', 'Place'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PostQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            /*$this -> touser = implode(',',$this -> touser);
            $this -> toparty = implode(',',$this ->toparty);*/
            return true;
        }else
        {
            return false;
        }
    }
}
