<?php

namespace common\models;

use Yii;
use trntv\filekit\behaviors\UploadBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property string $startdate
 * @property string $enddate
 * @property integer $teacherid
 * @property string $source
 * @property string $introduction
 * @property integer $status
 * @property string $thumbnail_base_url
 * @property string $thumbnail_path
 * @property string $project_num
 * @property string $finance_account
 * @property string $paper
 * @property string $patent
 * @property string $software
 * @property string $displayurl
 * @property  string $tagid
 */
class Project extends ActiveRecord
{

    public $thumbnail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project}}';
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
            [['name'], 'required'],
            [['startdate', 'enddate'], 'default', 'value' => function () {
                return date(DATE_ISO8601);
            }],
            [['startdate', 'enddate'], 'safe'],
            [['teacherid', 'status'], 'integer'],
            [['introduction'], 'string'],
            [['name',  'project_num', 'finance_account',  'displayurl'], 'string', 'max' => 255],
            [[ 'thumbnail_base_url', 'thumbnail_path'], 'string', 'max' => 1024],
            [['source'], 'string', 'max' => 100],
            [[ 'thumbnail'], 'safe'],
            [['paper', 'patent', 'software'], 'string'],
            [['tagid'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '项目id',
            'name' => '项目名称',
            'startdate' => '开始时间',
            'enddate' => '结束时间',
            'teacherid' => '项目负责人',
            'source' => '项目分类',
            'introduction' => '项目简介',
            'status' => 'Status',
            'thumbnail' => '封面图片',
            'project_num' => '项目编号',
            'finance_account' => '资金',
            'paper' => '论文',
            'patent' => '专利',
            'software' => '软件著作权',
            'displayurl' => '展示链接',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ProjectQuery(get_called_class());
    }

    public function getTeacher()
    {
        return $this->hasOne(UserProfile::className(), ['user_id' => 'teacherid']);
    }
}
