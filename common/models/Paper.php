<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
/**
 * This is the model class for table "{{%paper}}".
 *
 * @property integer $paper_id
 * @property integer $project_id
 * @property string $title
 * @property string $author
 * @property string $journal_name
 * @property string $publish_time
 * @property string $attachment
 */
class Paper extends \yii\db\ActiveRecord
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
        return '{{%paper}}';
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
            [['project_id'], 'integer'],
            [['author', 'journal_name'], 'required'],
            [['title', 'author'], 'string', 'max' => 225],
            [['journal_name', 'publish_time', 'attachment'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'paper_id' => '论文序号',
            'project_id' => '项目序号',
            'title' => '论文名称',
            'author' => '作者',
            'journal_name' => '会议/期刊名称',
            'publish_time' => '发表时间',
            'attachment' => '论文附件',
        ];
    }

    /**
     * @param $id
     * @return array
     */
    public static function getById($id){
        $rtnArray = [];
        $rtnArray[0]=Paper::findOne($id);
        return $rtnArray;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAll(){
        //print_r(\GuzzleHttp\json_encode(Software::find()->asArray()->all()));
        return Paper::find()->asArray()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemAttachments()
    {
        return $this->hasMany(ItemAttachment::className(), ['item_id' => 'paper_id'])->andWhere(['itemtype' => 1]);
    }
}
