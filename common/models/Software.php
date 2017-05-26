<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 * @property integer $softid
 * @property string $name
 * @property string $author
 * @property string $finishtime
 * @property string $regisnumber
 * @property string $enclosure
 */
class Software extends \yii\db\ActiveRecord
{

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
    public function rules()
    {
        return [
            [['softid'], 'required'],
            [['softid'], 'integer'],
            [['finishtime'], 'safe'],
            [['name', 'regisnumber'], 'string', 'max' => 50],
            [['author', 'enclosure'], 'string', 'max' => 20],
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
}
