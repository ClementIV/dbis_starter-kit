<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
/**
 * This is the model class for table "{{%patent}}".
 *
 * @property integer $patent_id
 * @property integer $project_id
 * @property string $title
 * @property string $inventors
 * @property string $status
 * @property integer $application_date
 * @property integer $authorization_date
 * @property string $application_number
 * @property string $patent_number
 * @property integer $attachment
 */
class Patent extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    public $attachments;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%patent}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [ 'class' => UploadBehavior::className(),
                'attribute' => 'attachments',
                'multiple' => true,
                'uploadRelation' => 'itemAttachments',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'orderAttribute' => 'order',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'application_date', 'authorization_date'], 'integer'],
            [['title', 'inventors', 'status', 'application_date'], 'required'],
            [['title', 'inventors'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 45],
            [['application_number', 'patent_number', 'attachment'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patent_id' => '专利序号',
            'project_id' => '项目序号',
            'title' => '专利名称',
            'inventors' => '作者',
            'status' => '状态',
            'application_date' => '申请日期',
            'authorization_date' => '授权日期',
            'application_number' => '申请号',
            'patent_number' => '专利号',
            'attachment' => '附件'
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public static function getById($id){
        $rtnArray = [];
        $rtnArray[0]=Patent::findOne($id);
        return $rtnArray;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAll(){
        //print_r(\GuzzleHttp\json_encode(Software::find()->asArray()->all()));
        return Software::find()->asArray()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemAttachments()
    {
        return $this->hasMany(ItemAttachment::className(), ['item_id' => 'patent_id'])->andWhere(['itemtype' => 2]);
    }
}
