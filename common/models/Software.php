<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
/**
 * This is the model class for table "software".
 *
 * @property integer $softid
 * @property string $name
 * @property string $author
 * @property string $finishtime
 * @property string $regisnumber
 * @property string $enclosure
 * @property integer $projectid
 * @property array $attachments
 * @property ItemAttachment[] $itemAttachments
 */
class Software extends \yii\db\ActiveRecord
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
        return '{{%software}}';
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
            [['softid'], 'required'],
            [['softid','projectid'], 'integer'],
            [['finishtime'], 'safe'],
            [['name', 'regisnumber'], 'string', 'max' => 255],
            [['author', 'enclosure'], 'string', 'max' => 255],
            [['attachments'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'softid' => 'Softid',
            'name' => 'Name',
            'author' => 'Author',
            'finishtime' => 'Finishtime',
            'regisnumber' => 'Regisnumber',
            'enclosure' => 'Enclosure',

        ];
    }
    public static function getById($id){
        $rtnArray = [];
        $rtnArray[0]=Software::findOne($id);
        return $rtnArray;
    }

    public static function getAll(){
       //print_r(\GuzzleHttp\json_encode(Software::find()->asArray()->all()));
       return Software::find()->asArray()->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemAttachments()
    {
        return $this->hasMany(ItemAttachment::className(), ['item_id' => 'softid'])->andWhere(['itemtype' => 3]);;;
    }
}
